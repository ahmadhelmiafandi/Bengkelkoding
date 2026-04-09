<x-layouts.app title="Data Poli">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-primary-blue">
            Manajemen Poli
        </h2>

        <a href="{{ route('polis.create') }}" 
           style="background-color: #2d4499"
           class="btn bg-primary-blue hover:bg-[#1e2d6b] text-white border-none rounded-lg px-5 shadow-sm">
            <i class="fas fa-plus"></i>
            Tambah Poli
        </a>
    </div>

    {{-- Alert Error --}}
    @if(session('error'))
    <div class="alert alert-error mb-4 rounded-xl shadow-sm">
        <i class="fas fa-circle-xmark"></i>
        <span>{{ session('error') }}</span>
    </div>
    @endif

    {{-- Card --}}
    <div class="card bg-base-100 shadow-xl rounded-2xl border border-slate-100 overflow-hidden">
        <div class="card-body p-0">

            <div class="overflow-x-auto">
                <table class="table table-zebra w-full">

                    {{-- Head --}}
                    <thead class="bg-slate-50 text-slate-500 text-[11px] uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-5">Nama Poli</th>
                            <th class="px-6 py-5">Keterangan</th>
                            <th class="px-6 py-5 text-center">Aksi</th>
                        </tr>
                    </thead>

                    {{-- Body --}}
                    <tbody>
                        @forelse($polis as $poli)
                        <tr class="hover:bg-slate-50 transition border-b border-slate-100">

                            <td class="px-6 py-5 font-semibold text-slate-800">
                                {{ $poli->nama_poli }}
                            </td>

                            <td class="px-6 py-5 text-slate-500 text-sm">
                                {{ $poli->keterangan }}
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex justify-center gap-3">

                                    {{-- Edit --}}
                                    <a href="{{ route('polis.edit', $poli->id) }}" 
                                       style="background-color: #f59e0b"
                                       class="btn btn-sm bg-edit-orange hover:bg-orange-600 
                                              text-white border-none rounded-lg px-4 gap-2 text-xs normal-case h-10 min-h-0">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('polis.destroy', $poli->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus poli ini?')"
                                            style="background-color: #ef4444" 
                                            class="btn btn-sm bg-delete-red hover:bg-red-600 
                                                   text-white border-none rounded-lg px-4 gap-2 text-xs normal-case h-10 min-h-0">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </form>

                                </div>
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center py-14 text-slate-400">
                                <i class="fas fa-inbox text-3xl mb-3 block"></i>
                                Belum ada data poli
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</x-layouts.app>