<div>
    <form id="twoStepsForm" action="{{route('login')}}" method="POST">
        @csrf
        <div class="mb-3">
          <div style="direction: ltr" class="auth-input-wrapper d-flex align-items-center justify-content-sm-between numeral-mask-wrapper">
            <input name="code1" type="tel" name="code" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1" autofocus>
            <input name="code2" type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
            <input name="code3" type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
            <input name="code4" type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
            <input name="code5" type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
            <input name="code6" type="tel" class="form-control auth-input h-px-50 text-center numeral-mask mx-1 my-2" maxlength="1">
          </div>
          <!-- Create a hidden field which is combined by 3 fields above -->
          <input type="hidden" name="codecheck" value="{{$mobile}}"/>
        </div>
        <button class="btn btn-primary d-grid w-100 mb-3">
          تایید
        </button>
        <div id="code-again" class="text-center" style="display: none;">
            کد را دریافت نکردید؟
            <a href="#" wire:click="SendNewCode">
              ارسال دوباره
            </a>
        </div>
        <div id="countdown" class="text-center"></div>
      </form>
</div>
