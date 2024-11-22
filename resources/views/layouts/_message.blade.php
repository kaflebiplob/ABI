@if (!empty(session('success')))
<div class="" style="color:green;">{{session('success')}}</div>

@endif
@if (!empty(session('error')))
<div class="" style="color:red;">{{session('error')}}</div>

@endif
@if (!empty(session('warning')))
<div class="" style="color:red;">{{session('warning')}}</div>

@endif
@if (!empty(session('info')))
<div class="" style="color:green;">{{session('info')}}</div>

@endif
@if (!empty(session('payment-error')))
<div class="" style="color:green;">{{session('payment-error')}}</div>

@endif
@if (!empty(session('secondary')))
<div class="" style="color:green;">{{session('secondary')}}</div>

@endif