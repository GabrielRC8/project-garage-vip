<?php

namespace App\Repositories;

use App\Group;

class GroupRepository
{
    public function all() {
        return Group::where('status','<>', 2)
            ->orderBy('name', 'asc')
            ->get();

    }

    public function allSelectForm() {
        return Group::where('status','<>', 2)
            ->orderBy('name', 'asc')
            ->lists('name','id');

    }

    public function delete($group) {
        $group->status = 2;

        $group->save();
    }
}