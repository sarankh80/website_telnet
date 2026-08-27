<?php

namespace App\Repositories\Admin\Fetch;

use Illuminate\Database\Eloquent\Collection;

class AppRepository
{
    public function getAll(string $model, array $with = []): Collection
    {
        return $model::query()
            ->with($with)
            ->get();
    }

    public function find(string $model, int $id)
    {
        return $model::query()->find($id);
    }

    public function findOrFail(string $model, int $id)
    {
        return $model::query()->findOrFail($id);
    }

    public function getWhere(
        string $model,
        array $conditions,
        array $with = []
    ): Collection {
        return $model::query()
            ->with($with)
            ->where($conditions)
            ->get();
    }

    public function firstWhere(
        string $model,
        array $conditions
    ) {
        return $model::query()
            ->where($conditions)
            ->first();
    }

    /**
     * Get data formatted for a select option.
     *
     * Returns:
     * [
     *     1 => 'Internet Service',
     *     2 => 'FTTH Service',
     * ]
     */
    public function getSelectOption(
        string $model,
        string $valueColumn = 'id',
        string|callable $label = 'name',
        mixed $selectedId = null,
        array $with = [],
        array $where = [],
        ?string $orderBy = null
    ): string {
        $query = $model::query();

        if (!empty($with)) {
            $query->with($with);
        }

        if (!empty($where)) {
            $query->where($where);
        }

        if ($orderBy) {
            $query->orderBy($orderBy);
        }

        $records = $query->get();

        $options = '';

        foreach ($records as $record) {
            $value = $record->{$valueColumn};

            $text = is_callable($label)
                ? $label($record)
                : $record->{$label};

            $selected = (
                $selectedId !== null &&
                (string) $value === (string) $selectedId
            )
                ? ' selected'
                : '';

            $options .= '<option value="' . e($value) . '"' . $selected . '>'
                . e($text)
                . '</option>';
        }

        return $options;
    }

    public function create(string $model, array $data)
    {
        return $model::create($data);
    }

    public function update(string $model, int $id, array $data)
    {
        $record = $model::query()->findOrFail($id);

        $record->update($data);

        return $record->refresh();
    }

    public function delete(string $model, int $id): bool
    {
        return $model::query()
            ->findOrFail($id)
            ->delete();
    }
}
