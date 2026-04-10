<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class UserController extends Controller
{
    /**
     * Get all users with roles
     */
    #[OA\Get(
        path: "/api/users",
        tags: ["User"],
        summary: "Get all users with roles",
        security: [["bearerAuth" => []]],
        responses: [
            new OA\Response(
                response: 200,
                description: "Users fetched successfully"
            )
        ]
    )]
    public function index()
    {
        $users = User::with('roles')->get();

        return response()->json([
            "success" => true,
            "data" => $users
        ]);
    }

    /**
     * Assign role to user (pivot table)
     */
    #[OA\Post(
        path: "/api/assign-role",
        tags: ["User"],
        summary: "Assign role to user",
        security: [["bearerAuth" => []]],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["user_id", "role_id"],
                properties: [
                    new OA\Property(property: "user_id", type: "integer", example: 1),
                    new OA\Property(property: "role_id", type: "integer", example: 2)
                ]
            )
        ),
        responses: [
            new OA\Response(
                response: 200,
                description: "Role assigned successfully"
            )
        ]
    )]
    public function assignRole(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'role_id' => 'required|exists:roles,id',
        ]);

        $user = User::findOrFail($request->user_id);

        // pivot attach (avoid duplicate)
        $user->roles()->syncWithoutDetaching([$request->role_id]);

        return response()->json([
            "success" => true,
            "message" => "Role assigned successfully"
        ]);
    }
}
