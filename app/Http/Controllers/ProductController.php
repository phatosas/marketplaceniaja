<?php

namespace marketplaceniaja\Http\Controllers;

use Illuminate\Http\Request;

use marketplaceniaja\Http\Requests;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
		$products = \marketplaceniaja\Product::with('type')->orderBy('id', 'desc')->get();
		$types = \marketplaceniaja\Type::with('products')->orderBy('id', 'desc')->get();
        return view('products.index')->with('products',$products)->with('types',$types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCreate()
    {
		$states_for_dropdown = \marketplaceniaja\State::statesForDropDown();
		$types_for_dropdown = \marketplaceniaja\Type::typesForDropDown();
		return view('products.create')->with('states_for_dropdown', $states_for_dropdown)
		->with('types_for_dropdown', $types_for_dropdown);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postCreate(Request $request)
    {
		$this->validate($request, [
			'name' => 'required|min:2',
			'description' => 'required|max:50',
			'image_link' => 'url',
			'image' => 'mimes:jpeg,bmp,png|max:2000kb',
		]);
		
		
		$product = new \marketplaceniaja\Product();
		$product->name = $request->name;
		$product->state_id = $request->state_id;
		$product->type_id = $request->type_id;
		
		$product->image_link = $request->image_link;
		$product->description = $request->description;
		$product->auth_id = $request->user_id;
		
		# If an image was selected...
		if($request->image) {
			$product->image = $request->image;
		}
		# If there were no image selected
		# default to an empty string
		else {
			$product->image = '';
		}		
		
		$product->save();
		
		\Session::flash('message', 'Your product has been added');
		
		return redirect('/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getShow($id)
    {
        $product =\marketplaceniaja\Product::find($id);
		return view('products.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEdit($id)
    {
        $book = \foobooks\Book::with('tags')->find($id);
		
		$authors_for_dropdown = \foobooks\Author::authorsForDropDown();


		$tags_for_checkbox = \foobooks\Tag::getTagsForCheckboxes();

    /*
    Create a simple array of just the tag names for tags associated with this book;
    will be used in the view to decide which tags should be checked off
    */
    $tags_for_this_book = [];
    foreach($book->tags as $tag) {
        $tags_for_this_book[] = $tag->id;
    }
    # Results in an array like this: $tags_for_this_book['novel','fiction','classic'];

    return view('books.edit')
        ->with([
            'book' => $book,
            'authors_for_dropdown' => $authors_for_dropdown,
            'tags_for_checkbox' => $tags_for_checkbox,
            'tags_for_this_book' => $tags_for_this_book,
        ]);

}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEdit(Request $request)
    {
        $book = \foobooks\Book::find($request->id);
		
		$book->title = $request->title;
		$book->author_id = $request->author_id;
		$book->published = $request->published;
		$book->cover = $request->cover;
		$book->purchase_link = $request->purchase_link;
		
		# If there were tags selected...
		if($request->tags) {
			$tags = $request->tags;
		}
		# If there were no tags selected (i.e. no tags in the request)
		# default to an empty array of tags
		else {
			$tags = [];
		}		
		$book->tags()->sync($tags);
		
		$book->save();
		
		\Session::flash('message', 'Your book has been updated');
		return redirect('/books/show/'.$request->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDelete($id)
    {
        $book =\foobooks\Book::find($id);
		$book->tags()->sync([]);
		
		$book->delete();
		\Session::flash('flash_message','The book has been deleted');
		return redirect('/books');
    }
}
