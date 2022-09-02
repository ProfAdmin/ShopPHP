<?php

namespace Repository;

final class FileStorage
{
    public function getFromFile(string $fileName): mixed
    {
        $data = file_get_contents('././' . $fileName);

        return json_decode($data, true);
    }

    public function saveToFile(string $fileName, mixed $data): void
    {
        $data = json_encode($data);
        file_put_contents('././' . $fileName, $data, LOCK_EX);
    }
}
