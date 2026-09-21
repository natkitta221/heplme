<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-bold text-xl text-slate-900 tracking-tight">
                    หนังสือที่ฉันต้องการ (Wanted Books)
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">
                    รายการหนังสือที่คุณกำลังตามหา ระบบจะนำไปจับคู่กับสมาชิกที่มีหนังสือเล่มนี้โดยอัตโนมัติ
                </p>
            </div>

            <a href="{{ route('wanted-books.create') }}" 
               class="inline-flex items-center gap-2 px-3.5 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold shadow-xs transition-colors self-start sm:self-auto">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"/>
                    <line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                <span>เพิ่มรายการที่ต้องการ</span>
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-5">

            {{-- Flash Alert --}}
            @if(session('success'))
                <div class="p-3.5 rounded-lg bg-emerald-50 border border-emerald-200 text-emerald-800 flex items-center justify-between shadow-xs">
                    <div class="flex items-center gap-2.5">
                        <svg class="w-4 h-4 text-emerald-600 shrink-0" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"/>
                            <polyline points="22 4 12 14.01 9 11.01"/>
                        </svg>
                        <p class="text-xs font-medium">{{ session('success') }}</p>
                    </div>
                    <button type="button" @click="$el.parentElement.remove()" class="text-emerald-600 hover:text-emerald-800 text-sm p-1">✕</button>
                </div>
            @endif

            {{-- Information Banner (Formal) --}}
            <div class="bg-white border border-slate-200 rounded-xl p-4 sm:p-5 flex items-center justify-between gap-4 shadow-xs">
                <div class="flex items-center gap-3.5">
                    <div class="w-9 h-9 rounded-lg bg-slate-100 text-slate-700 flex items-center justify-center shrink-0">
                        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10"/>
                            <line x1="12" y1="16" x2="12" y2="12"/>
                            <line x1="12" y1="8" x2="12.01" y2="8"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-semibold text-xs sm:text-sm text-slate-900">
                            แนวทางการบันทึกข้อมูลเพื่อการจับคู่ที่แม่นยำ
                        </h4>
                        <p class="text-xs text-slate-500 mt-0.5">
                            ระบุชื่อหนังสือและชื่อผู้แต่งอย่างถูกต้อง เพื่อช่วยให้อัลกอริทึมของระบบสามารถจับคู่รายการแลกเปลี่ยนได้อย่างมีประสิทธิภาพ
                        </p>
                    </div>
                </div>

                <a href="{{ route('matching.index') }}" class="hidden sm:inline-flex items-center gap-1.5 text-xs font-semibold text-slate-700 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 px-3.5 py-2 rounded-lg transition-colors shrink-0">
                    <span>ตรวจสอบคู่ที่ตรงกัน</span> <span>→</span>
                </a>
            </div>

            {{-- Wanted Books Grid --}}
            @if($wantedBooks->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                    @foreach($wantedBooks as $wantedBook)
                        <div class="bg-white rounded-xl border border-slate-200 shadow-xs hover:border-slate-300 transition-all flex flex-col overflow-hidden group">
                            
                            {{-- Book Cover --}}
                            <div class="relative aspect-[3/4] bg-slate-100 overflow-hidden">
                                @if($wantedBook->image)
                                    <img src="{{ asset('storage/' . $wantedBook->image) }}"
                                         alt="{{ $wantedBook->title }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-slate-100 text-slate-400">
                                        <svg class="w-10 h-10 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="11" cy="11" r="8"/>
                                            <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                                        </svg>
                                        <span class="text-xs text-slate-400 mt-2 font-medium">ไม่มีรูปภาพ</span>
                                    </div>
                                @endif

                                {{-- Wanted Badge --}}
                                <div class="absolute top-2.5 right-2.5">
                                    <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-800 text-white shadow-xs">
                                        กำลังตามหา
                                    </span>
                                </div>
                            </div>

                            {{-- Details Body --}}
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <div>
                                    <h3 class="font-semibold text-sm text-slate-900 line-clamp-1 leading-snug" title="{{ $wantedBook->title }}">
                                        {{ $wantedBook->title }}
                                    </h3>

                                    <p class="text-xs text-slate-500 truncate mt-1">
                                        ผู้แต่ง: {{ $wantedBook->author ?? 'ไม่ระบุ' }}
                                    </p>

                                    @if($wantedBook->description)
                                        <p class="text-xs text-slate-400 line-clamp-2 mt-1.5 leading-relaxed">
                                            {{ $wantedBook->description }}
                                        </p>
                                    @endif
                                </div>

                                {{-- Action Bar --}}
                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
                                    <span class="text-[11px] text-slate-400">
                                        บันทึกเมื่อ {{ $wantedBook->created_at ? $wantedBook->created_at->format('d/m/Y') : '-' }}
                                    </span>

                                    <form method="POST" action="{{ route('wanted-books.destroy', $wantedBook) }}"
                                          onsubmit="return confirm('ยืนยันว่าต้องการลบรายการที่ตามหานี้?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="inline-flex items-center gap-1 py-1.5 px-2.5 rounded-md text-xs font-semibold text-rose-700 bg-rose-50 hover:bg-rose-100 border border-rose-200 transition-colors">
                                            <span>ลบออก</span>
                                        </button>
                                    </form>
                                </div>

                            </div>

                        </div>
                    @endforeach
                </div>
            @else
                <div class="bg-white rounded-xl border border-slate-200 p-12 text-center text-slate-500 shadow-xs">
                    <svg class="w-12 h-12 text-slate-300 mx-auto mb-2" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"/>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                    </svg>
                    <h3 class="font-semibold text-sm text-slate-800">คุณยังไม่ได้เพิ่มหนังสือที่ต้องการ</h3>
                    <p class="text-xs text-slate-400 mt-1">
                        บันทึกรายชื่อหนังสือที่คุณกำลังตามหา เพื่อให้ระบบจับคู่กับคลังหนังสือของสมาชิกท่านอื่น
                    </p>
                    <a href="{{ route('wanted-books.create') }}" class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-lg bg-slate-900 hover:bg-slate-800 text-white text-xs font-semibold shadow-xs transition-colors">
                        <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="12" y1="5" x2="12" y2="19"/>
                            <line x1="5" y1="12" x2="19" y2="12"/>
                        </svg>
                        <span>เพิ่มรายการที่ต้องการเล่มแรก</span>
                    </a>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>