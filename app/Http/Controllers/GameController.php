<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// импорт фасада для работы с бд

class GameController extends Controller
{
    // создание новой игры

    public function createGame(Request $request): JsonResponse
    {

        //получаем имя игрока из POST-запроса

        $playerName = $request->input('player_name');
        $playerName1 =$request ->input ('player_name');
        // создаем пустое игровое поле 10x10 (двумерный массив), где каждое значение - пробел
        $emptyBoard = json_encode(array_fill(0, 10, array_fill(0, 10, ' ')));
        $emptyBoard1 = json_encode(array_fill(0,10, array_fill(0,10, ' ')));


        // вставляем данные о новой игре в таблицу game_board
//
//        DB::table('game_board')->insert([
//           'player_name' => $playerName, // имя игрока
//            'player_name1' => $playerName1, // имя игрока
//            'board_state' => $emptyBoard, // пустое игровое поле
//            'board_state1' => $emptyBoard1, // пустое игровое поле
//        ]);


        // возвращаем JSON-ответ с сообщением об успешном создании игры


        return response()->json(['message' => 'Игра создана!']);
    }


    //Чтение игры по ID


      public function getGame($id)
       {
        //Ищем игру по id в таблице game_board


        $game = DB::table('game_board')->where('id', $id)->first();

        // если игра не найдена возвращаем ошибку 404


        if (!$game) {
            return response()->json(['error' => 'Игра не найдена'], 404);
        }

        // возвращаем найденную игру в формате JSON

        return response()->json($game);
    }


    // обновление игры (например, после хода игрока)


    public function updateGame(Request $request, $id)
    {
        // получаем новое состояние игрового поля из запроса


        $newBoardState = $request->input('board_state');

        // обновляем запись в базе данных для указанного ID


        DB::table('game_board')
            ->where('id', $id)
            ->update(['board_state' => json_encode($newBoardState)]);

        // Возвращаем подтверждение успешного обновления


        return response()->json(['message' => 'Карта обновлена!']);
    }

    //Удаление игры по ID


    public function deleteGame($id)
    {
        // Удаляем игру из базы данных по указанному ID


        DB::table('game_board')->where('id', $id)->delete();

        // Возвращаем сообщение об успешном удалении


        return response()->json(['message' => 'Игра удалена']);
    }
}
