<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\UpdateRequest;
use App\Models\Todo;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Todo $todo)
    {
        $data = $request->validated();
        $todo->update($data);
        return $todo;
    }
}



