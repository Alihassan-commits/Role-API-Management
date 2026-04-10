<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class AuthController extends Controller
{
    #[OA\Post(
        path: "/api/login",
        tags: ["Auth"],
        summary: "User login",
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["email", "password"],
                properties: [
                    new OA\Property(property: "email", type: "string"),
                    new OA\Property(property: "password", type: "string")
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: "Login success")
        ]
    )]
    public function login(Request $request)
    {
        return response()->json([
            "token" => "fake-token",
            "user" => [
                "id" => 1,
                "name" => "Test User"
            ]
        ]);
    }
}
