<?php

namespace Source\Support;

class Paginator
{
    private int $limit;
    private int $range;
    private int $pages;
    private int $current_page;

    public function __construct(int $range, int $limit = 10, int $current_page = 1)
    {
        $this->limit = $limit;
        $this->range = $range;        
        $this->pages();
        $this->currentPage($current_page);
    }

    private function pages()
    {
        $this->pages = $this->range > 0 ? ceil($this->range / $this->limit) : 1;
    }

    private function currentPage(int $current_page)
    {
        $this->current_page = $current_page > $this->pages ? $this->pages : $current_page;
    }

    public function limit()
    {
        return $this->limit;
    }

    public function offset()
    {
        return $this->limit * ($this->current_page - 1);
    }

    public function pagesControls()
    {
        $pages = [];

        for ($i = 1; $i <= $this->pages; $i++)
        {
            $pages["Página{$i}"] = [
                'page' => $i,
                'current' => $i == $this->current_page
            ];
        }

        return $pages;
    }
}