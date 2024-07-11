<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;

class MarkController extends Controller
{
  public function index()
  {
    $marks = auth()->user()->marks;
    return view('marks', ['marks' => $marks]);
  }

  /**
   * Сохранение новой записи
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $request->validate([
        'name' => 'required|max:255',
        'longitude' => 'required',
        'width' => 'required',
    ]);
    
    $mark = auth()->user()->marks()->updateOrCreate(['id' => $request->id], [
      'name' => $request->name,
      'longitude' => $request->longitude,
      'width' => $request->width
    ]);

    return response()->json(['code' => 200, 'message' => 'Метка успешно создана', 'data' => $mark], 200);
    /*$mark = Mark::updateOrCreate(['id' => $request->id], [
      'name' => $request->name,
      'longitude' => $request->longitude,
      'width' => $request->width
    ]);*/
/*
    $mark = new Mark;
    $mark->name = $request->name;
    $mark->longitude = $request->longitude;
    $mark->width = $request->width;
    $mark->user_id = auth()->user()->id; // Assign user ID to the mark
    $mark->save();*/
  }

  /**
   * Вывод определенного поста
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    $mark = Mark::where('user_id', auth()->user()->id)->find($id); // Fetch mark belonging to the user

    if (!$mark) {
        return response()->json(['error' => 'Метка не найдена'], 404);
    }

    return response()->json($mark);
  }

  /**
   * Удаление поста из базы данных
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $mark = Mark::where('user_id', auth()->user()->id)->find($id);

        if (!$mark) {
            return response()->json(['error' => 'Метка не найдена'], 404);
        }

        $mark->delete();

        return response()->json(['success' => 'Метка успешно удалена']);
  }
}
