<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;

/**Models */
use App\Models\Article;
use App\Models\Category;
use App\Models\Page;
class Homepage extends Controller
{
    public function index()
    {

        $categories = Category::all();
        $data['articles'] = Article::where('status',1)->orderBy('created_at', 'DESC')->paginate(3);
        $data['categories'] = Category::OrderBy('name', 'ASC')->get();
        $data['pages'] = Page::orderBy('order', 'ASC')->get();
        $page = $data['pages'];
        return view('front.homepage', compact('data', 'categories', 'page'));
    }

    public function single($slug)
    {

        $data['articles'] = Article::where('slug', $slug)->first() ?? abort(403, 'ne yazdığına dikkat et');
        $article = $data['articles'];
        $data['images'] = Image::where('article_id',$data['articles']->id)->get();
        $article->increment('hit');
        $categories = Category::all();
        $data['categories'] = Category::OrderBy('name', 'ASC')->get();
        $data['pages'] = Page::orderBy('order', 'ASC')->get();
        return view('front.single', compact('data', 'categories'));
    }

    public function category($slug)
    {
        $data['categories'] = Category::OrderBy('name', 'ASC')->get();
        $data['pages'] = Page::orderBy('order', 'ASC')->get();
        $categories = Category::all();
        $category = Category::whereSlug($slug)->first() ?? abort(403, 'böyle bir kategori bulunamadı');
        $data['category'] = $category;
        $data['articles'] = Article::where('category_id', $category->id)->where('status',1)->orderBy('created_at', 'DESC')->get();
        return view('front.category', Compact('data', 'categories'));

    }

    public function page($slug)
    {
        $data['pages'] = Page::orderBy('order', 'ASC')->get();
        $data['firstPage'] = Page::whereSlug($slug)->first() ?? abort('403','Böyle Bir Sayfa Yok.');
        return view('front.page', compact('data'));
    }
}
