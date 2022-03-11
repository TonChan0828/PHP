<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;
use App\Models\Tag;
use App\Models\MemoTag;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $tags = Tag::where('user_id', '=', \Auth::id())->whereNull('deleted_at')->orderBy('id', 'DESC')->get();
        // dd($tags);
        return view('create', compact('tags'));
    }

    public function store(Request $request)
    {
        $posts = $request->all();

        $request->validate(['content' => 'required']);
        // メソッドの引数を受け取った値を展開して止める　データ確認
        // dd($posts);

        // トランザクション開始
        DB::transaction(function () use ($posts) {
            // メモIDをインサートして取得
            $memo_id = MEmo::insertGetId(['content' => $posts['content'], 'user_id' => \Auth::id()]);
            $tag_exists = Tag::where('user_id', '=', \Auth::id())->where('name', '=', $posts['new_tag'])->exists();
            // 新規タグが入力されているかをチェック
            // 新規タグがすでにtagsテーブルに存在するかをチェック
            if ((!empty($posts['new_tag']) || $posts['new_tag'] === 0) && !$tag_exists) {
                // 新規タグがすでに存在していなければ、tagsテーブルにインサート⇛IDを取得
                $tag_id = Tag::insertGetId(['user_id' => \Auth::id(), 'name' => $posts['new_tag']]);
                // memo＿tagsにインサートして、目元タグを紐付ける
                MemoTag::insert(['memo_id' => $memo_id, 'tag_id' => $tag_id]);
            }
            // 既存タグが紐付けられた場合
            if (!empty($posts['tag'][0])) {
                foreach ($posts['tags'] as $tag) {
                    MemoTag::insert(['memo_id' => $memo_id, 'tag_id' => $tag]);
                }
            }
        });
        // トランザクション終了

        return redirect(route('home'));
    }

    public function edit($id)
    {
        // メモを取得

        $edit_memo = Memo::select('memos.*', 'tags.id AS tag_id')
            ->leftJoin('memo_tags', 'memo_tags.memo_id', '=', 'memos.id')
            ->leftJoin('tags', 'memo_tags.tag_id', '=', 'tags.id')
            ->where('memos.user_id', '=', \Auth::id())
            ->where('memos.id', '=', $id)
            ->whereNull('memos.deleted_at')
            ->get($id);

        $include_tags = [];
        foreach ($edit_memo as $memo) {
            array_push($include_tags, $memo['tag_id']);
        }
        // dd($include_tags);
        $tags = Tag::where('user_id', '=', \Auth::id())->whereNull('deleted_at')->orderBy('id', 'DESC')->get();

        return view('edit', compact('edit_memo', 'include_tags', 'tags'));
    }

    public function update(Request $request)
    {
        $posts = $request->all();

        $request->validate(['content' => 'required']);

        // メソッドの引数を受け取った値を展開して止める　データ確認
        // dd(\Auth::id());

        // トランザクション開始
        DB::transaction(function () use ($posts) {
            Memo::where('id', $posts['memo_id'])->update(['content' => $posts['content']]);
            // 一度メモとタグの紐付けを削除
            MemoTag::where('memo_id', '=', $posts['memo_id'])->delete();
            // 再度目元タグを紐付け
            foreach ($posts['tags'] as $tag) {
                MemoTag::insert(['memo_id' => $posts['memo_id'], 'tag_id' => $tag]);
            }

            $tag_exists = Tag::where('user_id', '=', \Auth::id())->where('name', '=', $posts['new_tag'])->exists();
            // 新規タグが入力されているかをチェック
            // 新規タグがすでにtagsテーブルに存在するかをチェック
            if ((!empty($posts['new_tag']) || $posts['new_tag'] === 0) && !$tag_exists) {
                // 新規タグがすでに存在していなければ、tagsテーブルにインサート⇛IDを取得
                $tag_id = Tag::insertGetId(['user_id' => \Auth::id(), 'name' => $posts['new_tag']]);
                // memo＿tagsにインサートして、目元タグを紐付ける
                MemoTag::insert(['memo_id' => $posts['memo_id'], 'tag_id' => $tag_id]);
            }
        });
        // トランザクション終了

        Memo::where('id', $posts['memo_id'])->update(['content' => $posts['content']]);
        return redirect(route('home'));
    }

    public function destroy(Request $request)
    {
        $posts = $request->all();
        // メソッドの引数を受け取った値を展開して止める　データ確認
        // dd(\Auth::id());

        Memo::where('id', $posts['memo_id'])->update(['deleted_at' => date("Y-m-d H:i:s", time())]);
        return redirect(route('home'));
    }
}
