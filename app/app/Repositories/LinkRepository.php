<?php

namespace App\Repositories;

use App\Models\Link;

class LinkRepository
{
    /**
     * @param $link
     * @return mixed
     */
    public function createLink($link)
    {
        $old = Link::where('link', '=', $link)->first();
        if($old===NULL){
            $link = Link::create([
                'link' => $link,
            ]);
        }
        else $link = $old;
        $short = base_convert ((int)$link->id, 10 , 36);
        $link->update((['short' => $short]));
        return $link;
    }

    /**
     * @param $short
     * @return mixed
     */
    public function callLink($short)
    {
        $link = Link::where('short', $short)->first();
        return $link;
    }
}
