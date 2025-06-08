<div class="inline-page-menu my-4">
    <ul class="list-unstyled">
        <li class="{{ Request::is('admin/transaction/list') ?'active':'' }}"><a href="{{route('admin.transaction.list')}}">{{\App\CPU\translate('Order_Transactions')}}</a></li>
        <li class="{{ Request::is('admin/transaction/expense-list') ?'active':'' }}"><a href="{{route('admin.transaction.expense-list')}}">{{\App\CPU\translate('Expense_Transactions')}}</a></li>
        <li class="{{ Request::is('admin/refund-section/refund-list') ?'active':'' }}"><a href="{{ route('admin.refund-section.refund-list') }}">{{\App\CPU\translate('Refund_Transactions')}}</a></li>
    </ul>
</div>
