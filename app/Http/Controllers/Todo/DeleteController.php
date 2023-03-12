<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

namespace App\Http\Controllers\Todo;

use App\Http\Controllers\Controller;
use App\Models\Todo;

class DeleteController extends Controller
{
    public function __invoke(Todo $todo)
    {
        $todo->delete();
        return response('delete successful', 200);
    }
}



