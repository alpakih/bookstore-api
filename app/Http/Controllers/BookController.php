<?php

namespace App\Http\Controllers;

use App\Book;
use App\Http\Resources\Books as BooksResource;
use App\Http\Resources\Book as BookResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
	public function top($count)
	{
		$criteria = Book::select('*')
			->orderBy('views', 'DESC')
			->limit($count)
			->get();
		return new BooksResource($criteria);
	}


	public function index()
    {
        $criteria = Book::paginate(4);
        return new BooksResource($criteria);
    }

    public function slug($slug)
    {
        $criteria = Book::where('slug', $slug)->first();
        return new BookResource($criteria);
    }

    public function search($keyword)
    {
        $criteria = Book::select('*')->where('title', 'LIKE', "%" . $keyword . "%")
                        ->orderBy('views', 'DESC')
                        ->get();
        return new BooksResource($criteria);
    }
}
