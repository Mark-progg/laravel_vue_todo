<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreRequest;
use App\Models\Todo;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data  = $request->validated();
        $todo = Todo::create($data);
        return $todo;
    }
}



