<?php

namespace App\Services;

use App\Models\Branch;

class BranchService
{
    public function createBranch(array $data)
    {
        return Branch::create($data);
    }

    public function updateBranch(int $id, array $data)
    {
        $branch = Branch::findOrFail($id);
        $branch->update($data);
        return $branch;
    }
}
