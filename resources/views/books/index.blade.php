<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h2 class="font-bold text-xl text-slate-900 tracking-tight">
                    หนังสือของฉัน (My Books)
                </h2>
                <p class="text-xs text-slate-500 mt-0.5">
                    จัดการรายการหนังสือที่คุณครอบครองและเปิดให้สมาชิกในระบบแลกเปลี่ยน
                </p>
            </div>

            <a href="{{ route('books.create') }}" 
               class="inline-flex items-center gap-2 px-3.5 py-2 bg-slate-900 hover:bg-slate-800 text-white rounded-lg text-xs font-semibold shadow-xs transition-colors self-start sm:self-auto">
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19"/>
                    <line x1="5" y1="12" x2="19" y2="12"/>
                </svg>
                <span>เพิ่มหนังสือเล่มใหม่</span>
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

            {{-- Search & Filter Bar --}}
            <div class="bg-white p-4 rounded-xl border border-slate-200 shadow-xs">
                <form method="GET" action="{{ route('books.index') }}" class="flex flex-col sm:flex-row items-center gap-3">
                    <div class="relative flex-1 w-full">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"/>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
                            </svg>
                        </span>
                        <input
                            type="text"
                            name="search"
                            value="{{ request('search') }}"
                            placeholder="ค้นหาชื่อหนังสือ, ผู้แต่ง หรือหมวดหมู่..."
                            class="w-full pl-10 pr-4 py-2 rounded-lg border border-slate-200 bg-slate-50 text-xs sm:text-sm focus:bg-white focus:border-slate-400 focus:ring-1 focus:ring-slate-400 transition-colors placeholder:text-slate-400"
                        >
                    </div>

                    <div class="flex items-center gap-2 w-full sm:w-auto">
                        <button
                            type="submit"
                            class="flex-1 sm:flex-initial inline-flex items-center justify-center px-4 py-2 bg-slate-800 hover:bg-slate-900 text-white rounded-lg text-xs font-semibold transition-colors">
                            ค้นหา
                        </button>

                        @if(request('search'))
                            <a href="{{ route('books.index') }}" 
                               class="inline-flex items-center justify-center px-3 py-2 bg-slate-100 hover:bg-slate-200 text-slate-700 rounded-lg text-xs font-medium transition-colors">
                                ล้างการค้นหา
                            </a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- Books Grid --}}
            @if($books->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5">
                    @foreach($books as $book)
                        <div class="bg-white rounded-xl border border-slate-200 shadow-xs hover:border-slate-300 transition-all flex flex-col overflow-hidden group">
                            
                            {{-- Book Cover --}}
                            <div class="relative aspect-[3/4] bg-slate-100 overflow-hidden">
                                @if($book->image)
                                    <img src="{{ asset('storage/' . $book->image) }}"
                                         alt="{{ $book->title }}"
                                         class="w-full h-full object-cover">
                                @else
                                    <div class="w-full h-full flex flex-col items-center justify-center bg-slate-100 text-slate-400">
                                        <svg class="w-10 h-10 text-slate-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                                            <path d="M6 6h10"/>
                                            <path d="M6 10h10"/>
                                        </svg>
                                        <span class="text-xs text-slate-400 mt-2 font-medium">ไม่มีรูปภาพปก</span>
                                    </div>
                                @endif

                                {{-- Status Tag --}}
                                <div class="absolute top-2.5 right-2.5">
                                    @if($book->status === 'available')
                                        <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded text-[10px] font-semibold bg-emerald-700 text-white shadow-xs">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-300"></span>
                                            พร้อมแลก
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded text-[10px] font-semibold bg-slate-700 text-white">
                                            แลกแล้ว
                                        </span>
                                    @endif
                                </div>

                                {{-- Condition Tag --}}
                                @if($book->condition)
                                    <div class="absolute top-2.5 left-2.5">
                                        <span class="px-2 py-0.5 rounded text-[10px] font-medium bg-slate-900/80 text-white">
                                            {{ $book->condition }}
                                        </span>
                                    </div>
                                @endif
                            </div>

                            {{-- Book Details Body --}}
                            <div class="p-4 flex-1 flex flex-col justify-between">
                                <div>
                                    @if($book->category)
                                        <span class="inline-block text-[10px] font-semibold text-slate-600 bg-slate-100 px-2 py-0.5 rounded mb-1.5">
                                            {{ $book->category }}
                                        </span>
                                    @endif

                                    <h3 class="font-semibold text-sm text-slate-900 line-clamp-1 leading-snug" title="{{ $book->title }}">
                                        {{ $book->title }}
                                    </h3>

                                    <p class="text-xs text-slate-500 truncate mt-1">
                                        ผู้แต่ง: {{ $book->author ?? 'ไม่ระบุ' }}
                                    </p>

                                    @if($book->description)
                                        <p class="text-xs text-slate-400 line-clamp-2 mt-1.5 leading-relaxed">
                                            {{ $book->description }}
                                        </p>
                                    @endif
                                </div>

                                {{-- Action Buttons Toolbar --}}
                                <div class="mt-4 pt-3 border-t border-slate-100 flex items-center justify-between gap-2">
                                    <a href="{{ route('books.show', $book) }}"
                                       class="flex-1 inline-flex items-center justify-center gap-1 py-1.5 px-2 rounded-md text-xs font-semibold text-slate-700 bg-slate-100 hover:bg-slate-200 transition-colors">
                                        <span>รายละเอียด</span>
                                    </a>

                                    <a href="{{ route('books.edit', $book) }}"
                                       class="flex-1 inline-flex items-center justify-center gap-1 py-1.5 px-2 rounded-md text-xs font-semibold text-slate-700 bg-white border border-slate-300 hover:bg-slate-50 transition-colors">
                                        <span>แก้ไข</span>
                                    </a>

                                    <form method="POST" action="{{ route('books.destroy', $book) }}"
                                          onsubmit="return confirm('ยืนยันว่าต้องการลบหนังสือเล่มนี้หรือไม่?');"
                                          class="flex-1">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="w-full inline-flex items-center justify-center gap-1 py-1.5 px-2 rounded-md text-xs font-semibold text-rose-700 bg-rose-50 hover:bg-rose-100 border border-rose-200 transition-colors">
                                            <span>ลบ</span>
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
                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1-2.5-2.5Z"/>
                        <path d="M6 6h10"/>
                        <path d="M6 10h10"/>
                    </svg>
                    @if(request('search'))
                        <h3 class="font-semibold text-sm text-slate-800">ไม่พบหนังสือที่ตรงกับคำค้นหา "{{ request('search') }}"</h3>
                        <a href="{{ route('books.index') }}" class="inline-flex items-center gap-1 text-xs text-slate-700 font-semibold mt-3 hover:underline">
                            ← แสดงรายการหนังสือทั้งหมด
                        </a>
                    @else
                        <h3 class="font-semibold text-sm text-slate-800">คุณยังไม่มีหนังสือในคลัง</h3>
                        <p class="text-xs text-slate-400 mt-1">เริ่มต้นลงทะเบียนหนังสือเล่มแรกเพื่อค้นหาคู่แลกเปลี่ยนในระบบ</p>
                        <a href="{{ route('books.create') }}" class="inline-flex items-center gap-2 mt-4 px-4 py-2 rounded-lg bg-slate-900 hover:bg-slate-800 text-white text-xs font-semibold shadow-xs transition-colors">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="12" y1="5" x2="12" y2="19"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                            </svg>
                            <span>ลงทะเบียนหนังสือเล่มแรก</span>
                        </a>
                    @endif
                </div>
            @endif

        </div>
    </div>
</x-app-layout>