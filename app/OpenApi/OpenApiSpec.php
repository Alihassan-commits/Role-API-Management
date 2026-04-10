<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    title: "Role API",
    description: "Laravel 13 Role + Pivot API with Swagger"
)]
#[OA\Server(
    url: "http://127.0.0.1:8000",
    description: "Local server"
)]
#[OA\SecurityScheme(
    securityScheme: "bearerAuth",
    type: "http",
    scheme: "bearer",
    bearerFormat: "JWT"
)]
class OpenApiSpec {}
