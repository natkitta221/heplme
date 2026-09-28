<div {{ $attributes->merge(['class' => 'flex items-center gap-2.5']) }}>
    <img src="{{ asset('images/logo-icon.png') }}" alt="{{ config('app.name', 'BookCycle') }}" class="w-10 h-10 object-contain shrink-0">
    <div class="flex flex-col text-left">
        <span class="font-bold text-lg text-slate-900 tracking-tight leading-none">
            BookCycle
        </span>
        <span class="text-[11px] font-medium text-slate-500 mt-1">
            ระบบบริหารการแลกเปลี่ยนหนังสือแบบหมุนเวียน
        </span>
    </div>
</div>
