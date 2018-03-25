<?php

namespace App\Pagination;

use Illuminate\Contracts\Pagination\Presenter as PresenterContract;
use Illuminate\Contracts\Pagination\Paginator as PaginatorContract;
use Illuminate\Pagination\UrlWindow;
use Illuminate\Support\HtmlString;
use Illuminate\Pagination\BootstrapThreeNextPreviousButtonRendererTrait;
use Illuminate\Pagination\UrlWindowPresenterTrait;

class CustomPresenter implements PresenterContract
{
    use BootstrapThreeNextPreviousButtonRendererTrait, UrlWindowPresenterTrait;
    
    protected $paginator;
    protected $window;
    
    public function __construct(PaginatorContract $paginator, UrlWindow $window = null) 
    {
        $this->paginator = $paginator;
        $this->window    = is_null($window) ? UrlWindow::make($paginator) : $window->get();
    }
    
    public function render()
    {
        if ($this->hasPages()) {
            return new HtmlString(sprintf(
                '<ul class="pagination mx-auto">%s %s</ul>',
                $this->getNextButton('&larr; Older'),
                $this->getPreviousButton('Newer &rarr;')
            ));
        }

        return '';
    }
    
    public function hasPages()
    {
        return $this->paginator->hasPages();
    }
    
    protected function getDisabledTextWrapper($text)
    {
        //return '<li class="disabled"><span>' . $text .  '</span></li>';
        return '<li class="page-item"><a class="page-link" href="#" onclick="return false">'.$text .'</a></li>';
    }
    
    protected function getActivePageWrapper($text)
    {
        //return '<li class="page-item active">' . $text . '</li>';
        
        return '<li class="page-item active"><a class="page-link" href="#" onclick="return false">' .  $text . '</a></li>';
    }
    
    protected function getAvailablePageWrapper($url, $page, $rel = null)
    {
        //$rel = is_null($rel) ? '' : ' rel="'.$rel.'"';

        return '<li class="page-item"><a class="page-link" href="'.htmlentities($url).'"'.$rel.'>' . $page . '</a></li>';
    }
    
    protected function getDots()
    {
        return $this->getDisabledTextWrapper('...');
    }
}
