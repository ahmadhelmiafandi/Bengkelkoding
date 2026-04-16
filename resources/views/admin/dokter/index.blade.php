<x-layouts.app title="Data Dokter">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-2xl font-bold text-primary-blue">
            Data Dokter
        </h2>

        <a href="{{ route('dokter.create') }}" 
           style="background-color: #2d4499"
           class="btn bg-primary-blue hover:bg-[#1e2d6b] text-white border-none rounded-lg px-5 shadow-sm">
            <i class="fas fa-plus"></i>
            Tambah Dokter
        </a>
    </div>

    {{-- Alert Success --}}
    @if(session('message'))
    <div class="alert alert-{{ session('type') == 'success' ? 'success' : 'error' }} mb-4 rounded-xl shadow-sm">
        <i class="fas fa-{{ session('type') == 'success' ? 'circle-check' : 'circle-xmark' }}"></i>
        <span>{{ session('message') }}</span>
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
                            <th class="px-6 py-5">Nama Dokter</th>
                            <th class="px-6 py-5">Email</th>
                            <th class="px-6 py-5">No. KTP</th>
                            <th class="px-6 py-5">No. HP</th>
                            <th class="px-6 py-5">Alamat</th>
                            <th class="px-6 py-5">Poli</th>
                            <th class="px-6 py-5 text-center">Aksi</th>
                        </tr>
                    </thead>

                    {{-- Body --}}
                    <tbody>
                        @forelse($dokters as $dokter)
                        <tr class="hover:bg-slate-50 transition border-b border-slate-100">

                            <td class="px-6 py-5 font-semibold text-slate-800">
                                {{ $dokter->nama }}
                            </td>

                            <td class="px-6 py-5 text-slate-500 text-sm">
                                {{ $dokter->email }}
                            </td>

                            <td class="px-6 py-5 text-slate-500 text-sm">
                                {{ $dokter->no_ktp }}
                            </td>

                            <td class="px-6 py-5 text-slate-500 text-sm">
                                {{ $dokter->no_hp }}
                            </td>

                            <td class="px-6 py-5 text-slate-500 text-sm">
                                {{ $dokter->alamat }}
                            </td>

                            <td class="px-6 py-5">
                                <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider">
                                    {{ $dokter->poli->nama_poli ?? '-' }}
                                </span>
                            </td>

                            <td class="px-6 py-5">
                                <div class="flex justify-center gap-3">

                                    {{-- Edit --}}
                                    <a href="{{ route('dokter.edit', $dokter->id) }}" 
                                       style="background-color: #f59e0b"
                                       class="btn btn-sm bg-edit-orange hover:bg-orange-600 
                                              text-white border-none rounded-lg px-4 gap-2 text-xs normal-case h-10 min-h-0">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>

                                    {{-- Delete --}}
                                    <form action="{{ route('dokter.destroy', $dokter->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus dokter ini?')"
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
                            <td colspan="7" class="text-center py-14 text-slate-400">
                                <i class="fas fa-inbox text-3xl mb-3 block"></i>
                                Belum ada data dokter
                            </td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</x-layouts.app>
