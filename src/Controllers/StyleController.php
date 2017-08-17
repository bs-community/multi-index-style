<?php

namespace GPlane\MultiIndexStyle\Controllers;

use App\Http\Controllers\Controller;

class StyleController extends Controller
{
    private function bg() {
        if (option('use_bing_pic')) {
            $data = json_decode(file_get_contents('http://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1'), true);
            return 'https://cn.bing.com'.$data['images'][0]['url'];
        } elseif ($dir = option('random_bg_dir')) {
            $files = scandir($dir);
            if ($files) {
                $pics = array_filter($files, function ($file) use ($dir) {
                    return is_file("$dir/$file") && (
                        ends_with($file, '.png') ||
                        ends_with($file, '.jpg') ||
                        ends_with($file, '.bmp') ||
                        ends_with($file, '.jpeg')
                    );
                });

                return "$dir/".$pics[array_rand($pics)];
            }
        }

        return option('home_pic_url');
    }

    private function getText()
    {
        $result = array(
            'feature_1_title'   => empty(option('feature_1_title')) ? trans('index.features.multi-player.name') : option('feature_1_title'),

            'feature_1_text'    => empty(option('feature_1_text')) ? trans('index.features.multi-player.desc') : option('feature_1_text'),

            'feature_1_fa'      => empty(option('feature_1_fa')) ? 'fa-users' : option('feature_1_fa'),

            'feature_2_title'   => empty(option('feature_2_title')) ? trans('index.features.sharing.name') : option('feature_2_title'),

            'feature_2_text'    => empty(option('feature_2_text')) ? trans('index.features.sharing.desc') : option('feature_2_text'),

            'feature_2_fa'      => empty(option('feature_2_fa')) ? 'fa-share-alt' : option('feature_2_fa'),

            'feature_3_title'   => empty(option('feature_3_title')) ? trans('index.features.free.name') : option('feature_3_title'),

            'feature_3_text'    => empty(option('feature_3_text')) ? trans('index.features.free.desc') : option('feature_3_text'),

            'feature_3_fa'      => empty(option('feature_3_fa')) ? 'fa-cloud' : option('feature_3_fa'),

            'introdution_text'  => empty(option('introdution_text')) ? trans('index.introduction', ['sitename' => option('site_name')]) : option('introdution_text'),

            'start_button_text' => empty(option('start_button_text')) ? trans('index.start') : option('start_button_text'));

        return $result;
    }

    private function navBarItems()
    {
        $items = array();
        $nav_bar_text = option('nav_bar_items');
        if (strpos($nav_bar_text, "\r\n") >= 0)
            $items = explode("\r\n", $nav_bar_text);
        elseif (strpos($nav_bar_text, "\n") >= 0)
            $items = explode("\n", $nav_bar_text);
        elseif (strpos($nav_bar_text, "\r") >= 0)
            $items = explode("\r", $nav_bar_text);
        $nav_bar_items = array();
        $text = '';
        $link = '';
        $dropdown = array();
        foreach ($items as $item) {
            switch (substr($item, 0, 2)) {
                case '//':
                    break;
                case '|:':
                    $dropdown = array('type' => 'dropdown', 'title' => substr($item, 2), 'count' => 0, 'menu' => array());
                    break;
                case '||':
                    if ($text == '') {
                        $text = substr($item, 2);
                    } else if ($link == '') {
                        $link = substr($item, 2);
                    }
                    if (($text != '') && ($link != '')) {
                        if (substr($text, 0, 1) == '?') {
                            $dropdown['menu'][] = array('type' => 'link', 'text' => substr($text, 1), 'link' => $link);
                        } else {
                            $dropdown['menu'][] = array('type' => 'link_new_tab', 'text' => $text, 'link' => $link);
                        }
                        $dropdown['count']++;
                        $text = '';
                        $link = '';
                    }
                    break;
                case '|-':
                    $nav_bar_items[] = $dropdown;
                    break;
                default:
                    if ($text == '') {
                        $text = $item;
                    } else if ($link == '') {
                        $link = $item;
                    }
                    if (($text != '') && ($link != '')) {
                        if (substr($text, 0, 1) == '?') {
                            $nav_bar_items[] = array('type' => 'link', 'text' => substr($text, 1), 'link' => $link);
                        } else {
                            $nav_bar_items[] = array('type' => 'link_new_tab', 'text' => $text, 'link' => $link);
                        }
                        $text = '';
                        $link = '';
                    }
                    break;
            }
        }
        return $nav_bar_items;
    }

    public function info() {
        return response()->json([
            'bg' => $this->bg(),
            'feature' => $this->getText(),
            'navbar' => $this->navBarItems()
        ]);
    }

    public function exampleShow()
    {
        return view('GPlane\MultiIndexStyle::example');
    }
}
