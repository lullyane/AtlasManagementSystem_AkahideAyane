<?php
namespace App\Searchs;

use App\Models\Users\User;

class SearchResultFactories{

    // 改修課題：選択科目の検索機能
    public function initializeUsers($keyword, $category, $updown, $gender, $role, $subjects){
        if($category == 'name'){
        if(is_null($subjects)){
            $searchResults = new SelectNames();
        }else{
            $searchResults = new SelectNameDetails();
        }
        return $searchResults->resultUsers($keyword, $category, $updown, $gender, $role, $subjects);
        }else if($category == 'id'){
        if(is_null($subjects)){
            $searchResults = new SelectIds();
        }else{
            $searchResults = new SelectIdDetails();
        }
        return $searchResults->resultUsers($keyword, $category, $updown, $gender, $role, $subjects);
        }else{
        $allUsers = new AllUsers();
        return $allUsers->resultUsers($keyword, $category, $updown, $gender, $role, $subjects);
        }
    }

    public function index(Request $request){
        $selected = $request->input('subject', []);
        $users = User::query()
            ->when($selected, function ($query) use ($selected) {
                $query->whereHas('subjects', function ($q) use ($selected) {
                    $q->where(function ($sub) use ($selected) {
                        foreach ($selected as $id) {
                            $sub->orWhere('subjects.id', $id);
                        }
                    });
                });
            })
            ->get();
        return view('users.index', compact('users'));
    }
}
