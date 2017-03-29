<?php

namespace App\DataTables;

use App\Models\StoreLevel;
use Form;
use Yajra\Datatables\Services\DataTable;

class StoreLevelDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'store_levels.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $storeLevels = StoreLevel::query();

        return $this->applyScopes($storeLevels);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => true,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'name' => ['name' => 'name', 'data' => 'name'],
            'store_type_class_id' => ['name' => 'store_type_class_id', 'data' => 'store_type_class_id'],
            'weigh' => ['name' => 'weigh', 'data' => 'weigh'],
            'total_num' => ['name' => 'total_num', 'data' => 'total_num'],
            'security_deposit' => ['name' => 'security_deposit', 'data' => 'security_deposit'],
            'system_use_fee' => ['name' => 'system_use_fee', 'data' => 'system_use_fee']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'storeLevels';
    }
}
