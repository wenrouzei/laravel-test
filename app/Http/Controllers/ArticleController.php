<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Model\AdminRole;
use Illuminate\Support\Facades\Hash;//hash门面
use Illuminate\Support\Facades\DB;//db门面


class ArticleController extends Controller
{

	// public function __construct(){
	// 	$this->middleware('auth');
	// }

    //
    public function index(){
    	// $b = hash::make('234234');
    	// echo $b;
    	// $b = '3333';
    	// var_dump(Hash::needsRehash($b));
    	// var_dump(hash::check('234234', $b));
        //
    	// $a = 'cccc';
    	// echo encrypt($a);
    	// echo "<br>";
    	// echo decrypt(encrypt($a));
    	// var_dump(config('app.key'));
    	// $file = file_get_contents(public_path('storage'.DIRECTORY_SEPARATOR.'1.txt'));
    	// var_dump($file);
    	// dd(AdminRole::all());
    	// return redirect()->route('articleId', ['id'=>1]);

    	// var_dump(public_path('uploads'));
    	// var_dump(base_path('xx'));
    	// var_dump(app_path('xx'));
    	// var_dump(resource_path('xx'));
        // \Debugbar::disable();

        //return config('lee.key2');//测试获取自建配置lee.php文件里返回数组键名key2的值

        #################################DB门面数据库操作测试##########################################################
        // 查询
        // $article = DB::select("select * from articles where id<?",[2]);
        // dd($article);

        // 插入
        // $bool = DB::insert("insert into articles (title, body, user_id) values (?,?,?)",['test db facede','test db facede body',1]);
        // var_dump($bool);

        //更新
        // $num = DB::update("update articles set user_id=? where id=?",[2,1]);
        // var_dump($num);
        //

        // 删除
        // $num = DB::delete('delete from articles where id = ?', [2]);
        // var_dump($num);
        ###############################################################################################################



    	return view('article',['articles'=>Article::orderBy('id', 'DESC')->paginate(5)]);
    }

    public function show($id){
    	return view('article/show')->withArticle(Article::with('hasManyComments')->findOrFail($id));
    }

    /**
     * DB数据库查询构造器
     * @return [type] [description]
     */
    public function query(){
        // return route('articlequery');//name方法也可设置路由别名

        #####################插入
        // $bool = DB::table("articles")->insert(['title'=>'test 2','body'=>'test 2', 'user_id'=>1]);
        // var_dump($bool);

        // $id = DB::table("articles")->insertGetId(['title'=>'test 3','body'=>'test 3', 'user_id'=>3]);
        // var_dump($id);

        // $bool = DB::table("articles")->insert([
        //     ['title'=>'test 2','body'=>'test 2', 'user_id'=>1],
        //     ['title'=>'test 4','body'=>'test 4', 'user_id'=>4]
        // ]);
        // var_dump($bool);

        ####################更新
        // $num = DB::table("articles")->where('id',1)->update(['user_id'=>100]);
        // var_dump($num);

        // 更新之某字段值自增
        // $num = DB::table("articles")->increment('user_id');
        // $num = DB::table("articles")->increment('user_id',3);
        // $num = DB::table("articles")->where('id',1)->increment('user_id');
        // $num = DB::table("articles")->where('id',1)->increment('user_id',1, ['title'=>'某字段值自增并更新其他字段']);
        // var_dump($num);

        // 更新至某字段值自减
        // $num = DB::table("articles")->decrement('user_id');
        // $num = DB::table("articles")->decrement('user_id',3);
        // $num = DB::table("articles")->where('id',1)->decrement('user_id');
        // var_dump($num);

        ######################删除
        // $num = DB::table("articles")
        //         ->where('id',12)
        //         ->delete();

        // $num = DB::table("articles")
        //     ->where("id",">=",15)
        //     ->delete();
        // var_dump($num);

        // DB::table("articles")->truncate();//清空所有数据没返回值
        //
        //

        #######################查询
        // $articles = DB::table("articles")->get();
        // $articles = DB::table("articles")
        //     ->where('id','<=',3)
        //     ->orderBy('id','desc')
        //     ->first();
        // $articles = DB::table("articles")
        //     ->whereRaw('id>? and user_id>?',[1,1])
        //     ->get();

        // $articles = DB::table("articles")
        //     // ->pluck('title');//只返回某字段
        //     ->pluck('title', 'user_id');//只返回某字段,可用其他字段作为键名

        // $articles = DB::table("articles")
        //     ->select('id','title','user_id')
        //     ->get();

        // dd($articles);

        // 每次查n条，分n次查出来
        // echo "<pre>";
        // DB::table('articles')->where('id','>',3)->chunk(2,function($articles){
        //     var_dump($articles);
        // });

        ######################聚合函数
        $num = DB::table("articles")->count();
        var_dump($num);
        $num = DB::table("articles")->max('id');
        var_dump($num);
        $num = DB::table("articles")->min('id');
        var_dump($num);
        $avg = DB::table("articles")->avg('id');
        var_dump($avg);
        $sum = DB::table("articles")->sum('id');
        var_dump($sum);
    }

    public function orm(){
        ######################查询
        // $articles = Article::all();
        // $articles = Article::find(12);
        // echo $articles->created_at;
        // $articles = Article::findOrFail(11111);
        // $articles = Article::get();
        // $articles = Article::where('id','<','3')
        //     ->orderBy('id','desc')
        //     ->first();
        // dd($articles);

        // echo "<pre>";
        // Article::chunk(2,function($articles){
        //     var_dump($articles);
        // });

        // $num = Article::count();
        // $num = Article::max('id');
        // $num = Article::min('id');
        // $num = Article::sum('id');
        // $num = Article::where('id','<',5)
        //     ->avg('id');
        // var_dump($num);

        ########################插入
        // $article = new Article();
        // $article->title = 'orm test';
        // $article->body = 'orm test';
        // $article->user_id = 1;
        // // dd($article);
        // $bool = $article->save();
        // dd($bool);


        // $article = Article::create(
        //     ['title' => '测试模型create方法新建数据', 'body' => '测试模型create方法新建数据', 'user_id'=>100]
        // );
        // $article = Article::firstOrCreate(
        //     ['title' => '测试模型create方法新建数据111', 'user_id'=>333]
        // );
/*        $article = Article::firstOrNew(
            ['title' => '测试模型create方法新建数据2222', 'user_id'=>2222]
        );
        // dd($article);
        $bool = $article->save();
        dd($bool);*/

        ########################更新
        //通过模型更新
/*        $article = Article::find(12);
        $article->title = 'update title';
        $bool = $article->save();
        var_dump($bool);

        $num = Article::where('id','<',15)->where("id",">",12)->update(['title'=>'update title 2']);
        var_dump($num);
*/
        ########################删除
        //通过模型删除
/*        $article = Article::find(12);
        $bool = $article->delete();
        var_dump($bool);*/

        //通过主键删除
/*        $num = Article::destroy(13,14);
        var_dump($num);*/

/*        $num = Article::where("id","=",15)->delete();
        var_dump($num);*/
    }
}
