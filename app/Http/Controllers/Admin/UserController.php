<?php

namespace App\Http\Controllers\Admin;

use App\Availability;
use App\Category;
use App\User;
use App\Http\Controllers\Controller;
use App\Sponsorship;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{

    protected $validation = [
        'name' => 'required|string|max:255',
        'surname' => 'required|string|max:25',
        'bio' => 'nullable|string',
        'username' => 'nullable|string|max:255',
        'avatar' => 'nullable|mimes:mimes:jpeg,jpg,png,gif|max:2048',
        'cv' => 'nullable|file|mimes:pdf|max:2048',
        'cellphone' => 'nullable',
        'address' => 'nullable',
        'categories' => 'nullable|exists:categories,id',
        'availabilities' => 'nullable|exists:availabilities,id',
        'sponsorships' => 'nullable|exists:sponsorships,id',
        'email' => 'required|string|email|max:255',
    ];

    protected function slug($title = "", $id = "")
    {
        $tmp = Str::slug($title);
        $count = 1;
        while (User::where('slug', $tmp)->where('id', '!=', $id)->first()) {
            $tmp = Str::slug($title) . "-" . $count;
            $count++;
        }
        return $tmp;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();
        $categories = Category::all();
        $availabilities = Availability::all();
        $sponsorships = Sponsorship::all();

        return view('admin.users.edit', compact(['user', 'categories', 'availabilities', 'sponsorships']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate($this->validation);

        $data = $request->all();

        $data["slug"] = ($user->title == $data['name']) ? $user->slug : $this->slug($data['name'], $user->id);
        if (isset($data['avatar'])) {
            $img_path = Storage::put('uploads', $data['avatar']);
            $data['avatar'] = $img_path;
        }

        $data["slug"] = ($user->name == $data['name']) ? $user->slug : $this->slug($data['name'], $user->id);
        $user->update($data);

        $user->categories()->sync(isset($data['categories']) ? $data['categories'] : []);
        $user->sponsorships()->sync(isset($data['sponsorships']) ? $data['sponsorships'] : []);
        $user->availabilities()->sync(isset($data['availabilities']) ? $data['availabilities'] : []);

        return redirect()->route('admin.users.show', $user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
