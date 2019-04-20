<?php
/**
 * Godios. WordPress Theme
 * @author: Simmon
 * @link https://simmon.design/
 * @license: http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 * 
 * This library incorporates code from Luxeritas WordPress Theme, Copyright 2015 WordPress.org.
 * Luxeritas WordPress Theme is distributed under the terms of the GNU GPL.
 */
 
/**
 * Luxeritas WordPress Theme - free/libre wordpress platform
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * @copyright Copyright (C) 2015 Thought is free.
 * @license http://www.gnu.org/licenses/gpl-2.0.html GPL v2 or later
 * @author LunaNuko
 * @link https://thk.kanzae.net/
 * @translators rakeem( http://rakeem.jp/ )
 */

class BreadCrumb {
    
    public $category;
    public $lists;
    public $home;
    public $schema = null;
    
    function __construct() {
        global $wwata, $post;
        
        if ( is_category() ) {
            $this->category[0] = get_queried_object();
        } elseif ( is_single() ) {
            $this->category = get_the_category();
        }
        $this->home = '<li><a href="'.$wwata['home_url'].'">ホーム</a></li>';
        if ( 1 === count( $this->category ) ) {
            
            $this->generate_a_category_list();
            
        } elseif ( 2 <= count( $this->category ) ) {
        
            foreach( $this->category as $cat ) {
                if ( 0 === $cat->parent ) { continue; }
                
                $tmp = get_category_parents( $cat->term_id, true, ',' );
                if ( mb_strlen( $this->lists ) < mb_strlen( $tmp ) ) {
                    $this->lists = $tmp;
                }
            }
            
            // 親カテゴリーを持たないカテゴリーを複数紐付けた場合、最初のカテゴリーを一つだけ表示させる
            if ( empty( $this->lists ) ) {
                $this->generate_a_category_list();
            } else {
                $lists_array = explode( ',', $this->lists );
                $wwata['last_category'] = $lists_array[ count( $lists_array ) - 2 ];
                $this->lists = str_replace( ['<a', '/a>,'], ['<li><a', '/a></li>'], $this->lists );
                
                preg_match_all( '|<a href=\"(.*?)\".*?>(.*?)</a>|mis', $this->lists, $matches );
                foreach( $matches[1] as $key => $url ) {
                    $this->generate_breadcrumb_schema( $url, $matches[2][$key], $key + 2 );
                }
            }
        }
        
        // 記事タイトルを追加
        // $this->lists .= '<li><span>'.$post->post_title.'</span></li>';
        
    }
    
    private function generate_a_category_list() {
        global $wwata;
        
        $position = 2;
        foreach( $this->category as $cat ) {
            if ( 0 === $cat->parent ) { continue; }
            
            $parent = get_category( $cat->parent );
            $url = get_category_link( $parent->term_id );
            $cat_title = $parent->name;
            $this->lists = sprintf( '<li><a href="%s">%s</a></li>', $url, $cat_title );
            $this->generate_breadcrumb_schema( $url, $cat_title, $position );
            ++$position;
        }

        $url = get_category_link( $this->category[0]->term_id );
        $cat_title = $this->category[0]->name;
        $this->generate_breadcrumb_schema( $url, $cat_title, $position );
        $cat_link = '<a href="' . $url . '">' . $cat_title . '</a>';
        $wwata['last_category'] = $cat_link;
        $this->lists .= '<li>' . $cat_link . '</li>';
    }
    
    private function generate_breadcrumb_schema( $url, $cat_title, $position ) {
        $this->schema[] = [
            '@type'    => 'ListItem',
            'position' => $position,
            'item'     => [
                '@id'  => $url,
                'name' => $cat_title
            ]
        ];
    }
}

global $wwata, $post;

$wwata['no-image-class'] = '';
if ( is_singular() ) {
    if ( ! isset( $wwata['has_post_thumbnail'] ) ) {
        $wwata['has_post_thumbnail'] = has_post_thumbnail();
    }
    
    if ( ! $wwata['has_post_thumbnail'] ) {
        $wwata['no-image-class'] = 'no-img';
    }
}

echo '<ol id="breadcrumb" class="breadcrumb '.$wwata['no-image-class'].'">';
$home_list = '<li><a href="'.$wwata['home_url'].'">ホーム</a></li>';
$cat_schema = null;
switch ( true ) {
	case is_page():
	    echo '<li><a href="'.$wwata['home_url'].'" class="'.$wwata['no-image-class'].'">ホーム</a></li>';  
        // echo '<li><span class="'.$wwata['no-image-class'].'">'.$post->post_title.'</span></li>';
		break;
		
	case is_single() || is_category():
	    if ( is_category() ) {
	        $wwata['archive_title'] = single_term_title( '', false );
	        $breadcrumb = new BreadCrumb();
            echo $breadcrumb->home.$breadcrumb->lists;
            $cat_schema = $breadcrumb->schema;
	    } else {
    	    $breadcrumb = new BreadCrumb();
            echo $breadcrumb->home.$breadcrumb->lists;
            $wwata['post']['categories'] = $breadcrumb->category;
            $cat_schema = $breadcrumb->schema;
	    }
		break;
		
	case is_search():
	    echo $home_list.'<li><span>「'.$wwata['search_query'].'」の検索結果</span></li>';
		break;
		
	case is_post_type_archive():
	    $wwata['archive_title'] = post_type_archive_title( '', false );
	    echo $home_list.'<li><span>'.$wwata['archive_title'].'</span></li>';
	    break;
		
	case is_tag():
	    $wwata['archive_title'] = single_term_title( '', false );
        echo $home_list.'<li><span>'.$wwata['archive_title'].'</span></li>';
		break;
		
	case is_date():
        switch ( true ) {
            case is_year():
                $wwata['archive_title'] = get_the_date('Y年');
                break;
                
            case is_month():
                $wwata['archive_title'] = get_the_date('Y年m月');
                break;
                
            case is_day():
                $wwata['archive_title'] = get_the_date('Y年m月d日');
                break;
                
            default:
                break;
        }
        echo $home_list.'<li><span>'.$wwata['archive_title'].'</span></li>';
		break;
		
	case is_author():
	    $wwata['archive_title'] = get_the_author();
        echo $home_list.'<li><span>'.$wwata['archive_title'].'</span></li>';
		break;
		
	default:
		break;
}

echo '</ol>';


$bc_schema = [
    '@context'        => 'http://schema.org',
    '@type'           => 'BreadcrumbList',
    'itemListElement' => [
        [
            '@type'    => 'ListItem',
            'position' => 1,
            'item'     => [
                '@id'  => $wwata['home_url'],
                'name' => 'ホーム'
            ]
        ]
    ]
];

if ( null !== $cat_schema ) {
    foreach ( $cat_schema as $list_item ) {
        $bc_schema['itemListElement'][] = $list_item;
    }
}

$wwata['schema_org'][] = $bc_schema;
