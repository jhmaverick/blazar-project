<?php

/*
 * This file is part of Blazar Framework.
 *
 * (c) João Henrique <joao_henriquee@outlook.com>
 *
 * For the full copyright and license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Application\Page\Home;

use Blazar\Component\Text\Text;
use Blazar\Component\View\View;
use Blazar\Component\View\ViewException;
use Blazar\Core\App;
use Blazar\Core\Log;
use Blazar\Core\Manifest;

class Home extends View {
    private $map_info;

    private $view_path = __DIR__ . '/home.mustache';
    private $page_res = [
        'home.css' => __DIR__ . '/home.css',
    ];

    /**
     * Home constructor.
     */
    public function __construct() {
        try {
            $this->map_info = App::current();

            $this->preparePage($this->view_path, $this->page_res, 'showView')->render();
        } catch (ViewException $e) {
            Log::e($e);
        }
    }

    /**
     * Callback para exibir a view.
     */
    protected function showView() {
        $data = Manifest::data();

        $this->set('url_base', URL_BASE);

        $this->set('msg', 'Bem-vindo ao ' . $data['name']);
        $this->set('title', $data['name'] . " " . $data['version']);
        $this->set('home_css', $this->map_info['url_path'] . '/home.css');
        $this->set('blazar', Text::get('blazar'));
    }
}