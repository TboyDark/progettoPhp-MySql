<?php

use App\Core\Database\QueryBuilder;
use App\Core\Database\Connection;

return new QueryBuilder(Connection::make());