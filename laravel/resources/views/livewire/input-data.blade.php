<div>
    <div>
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <h6 class="d-flex justify-content-center"> Step {{$currentStep}} of {{$totalStep}}</h6>
        <form wire:submit="submit">
            <div class="card-body">

            @if($currentStep===1)
                <div class="form-group">
                    <label for="mdd_ci">MGG CI</label>
                    <input type="number" class="form-control" id="mdd_ci" name="mdd_ci" wire:model.live="mdd_ci" required>
                </div>
                
                <input type="hidden" class="form-control" id="priode_id" name="priode_id" value="{{ $priode_id }}" readonly required>

                <div class="form-group">
                    <label for="tgl_ci">Tanggal CI</label>
                    <input type="date" class="form-control" id="tgl_ci" name="tgl_ci" wire:model="tgl_ci" required>
                </div>

                <div class="form-group">
                    <label for="pop_e">Pop E</label>
                    <input type="number" class="form-control" id="pop_e" name="pop_e" wire:model="pop_e" required>
                </div>

                <div class="form-group">
                    <label for="bw_doc">BW DOC</label>
                    <input type="number" class="form-control" id="bw_doc" name="bw_doc" wire:model="bw_doc" required>
                </div>

                <div class="form-group">
                    <label for="doc">DOC</label>
                    <input type="text" class="form-control" id="doc" name="doc" wire:model="doc" required>
                </div>

                <div class="form-group">
                    <label for="jenis_pakan">Jenis Pakan</label>
                    <input type="text" class="form-control" id="jenis_pakan" name="jenis_pakan" wire:model="jenis_pakan" required>
                </div>

                <div class="form-group">
                    <label for="tkp_sak">TKP/Sak</label>
                    <input type="number" class="form-control" id="tkp_sak" name="tkp_sak" wire:model="tkp_sak" required>
                </div>

                <div class="form-group">
                    <label for="sp_sak">SP/Sak</label>
                    <input type="number" class="form-control" id="sp_sak" name="sp_sak" wire:model="sp_sak" required>
                </div>
                <!-- end step 1 -->
                @elseif($currentStep===2)
                <div class="form-group">
                    <label for="terpakai">Terpakai</label>
                    <input type="number" class="form-control" id="terpakai" name="terpakai" wire:model.live="terpakai" required disabled>
                </div>
                <div class="form-group">
                    <label for="umur">Umur</label>
                    <input type="text" class="form-control" id="umur" name="umur" wire:model.live="umur" required disabled>
                </div>
                <div class="form-group">
                    <label for="mor_e">Mor/E</label>
                    <input type="number" class="form-control" id="mor_e" name="mor_e" wire:model.live="mor_e" required>
                </div>
                <div class="form-group">
                    <label for="mor">Mor/%</label>
                    <input type="number" class="form-control" id="mor" name="mor" wire:model.live="mor" required disabled @if($mor>3){ style="color:red;"} @endif>
                </div>
                <div class="form-group">
                    <label for="ayam_hidup">Ayam Hidup</label>
                    <input type="number" class="form-control" id="ayam_hidup" name="ayam_hidup" wire:model.live="ayam_hidup" required disabled>
                </div>
                <div class="form-group">
                    <label for="bw">BW</label>
                    <input type="number" step="0.01" class="form-control" id="bw" name="bw" wire:model.live="bw" required>
                </div>
                <div class="form-group">
                    <label for="fi">FI</label>
                    <input type="number" step="0.01" class="form-control" id="fi" name="fi" wire:model.live="fi" required disabled>
                </div>
                <div class="form-group">
                    <label for="act_fcr">Act FCR</label>
                    <input type="number" step="0.01" class="form-control" id="act_fcr" name="act_fcr" wire:model.live="act_fcr" required disabled>
                </div>

                <!-- end step 2 -->
                @elseif($currentStep===3)
                <div class="form-group">
                    <label for="std_fcr">Std FCR</label>
                    <input type="number" step="0.01" class="form-control" id="std_fcr" name="std_fcr" wire:model.live="std_fcr" required disabled>
                </div>
                <div class="form-group">
                    <label for="dif">Dif</label>
                    <input type="number" step="0.01" class="form-control" id="dif" name="dif" wire:model.live="dif" required disabled>
                </div>
                <div class="form-group">
                    <label for="pbbh">PBBH</label>
                    <input type="number" step="0.01" class="form-control" id="pbbh" name="pbbh" wire:model.live="pbbh" required>
                </div>
                <div class="form-group">
                    <label for="std_pbbh">Std PBBH</label>
                    <input type="number" class="form-control" id="std_pbbh" name="std_pbbh" wire:model.live="std_pbbh" required>
                </div>
                <div class="form-group">
                    <label for="progres">Progres</label>
                    <input type="number" class="form-control" id="progres" name="progres" wire:model.live="progres" required>
                </div>
                <div class="form-group">
                    <label for="ep">EP</label>
                    <input type="number" class="form-control" id="ep" name="ep" wire:model.live="ep" required>
                </div>
                <div class="form-group">
                    <label for="std_eph">Std EPH</label>
                    <input type="number" class="form-control" id="std_eph" name="std_eph" wire:model.live="std_eph" required>
                </div>
                <div class="form-group">
                    <label for="progres2">progres 2</label>
                    <input type="number" class="form-control" id="progres2" name="progres2" wire:model.live="progres2" required>
                </div>
                <div class="form-group">
                    <label for="suhu">Suhu</label>
                    <input type="number" class="form-control" id="suhu" name="suhu" wire:model.live="suhu" required>
                </div>
                <div class="form-group">
                    <label for="rh">RH</label>
                    <input type="number" class="form-control" id="rh" name="rh" wire:model.live="rh" required>
                </div>
                <!-- end step 3 -->
                @elseif($currentStep===4)
                <div class="form-group">
                    <label for="hi">HI</label>
                    <input type="number" class="form-control" id="hi" name="hi" wire:model="hi" required>
                </div>
                <div class="form-group">
                    <label for="kepadatan">Kepadatan</label>
                    <input type="number" class="form-control" id="kepadatan" name="kepadatan" wire:model="kepadatan" required>
                </div>
                <div class="form-group">
                    <label for="tra">TRA</label>
                    <input type="number" class="form-control" id="tra" name="tra" wire:model="tra" required>
                </div>
                <div class="form-group">
                    <label for="tma">TMA</label>
                    <input type="number" class="form-control" id="tma" name="tma" wire:model="tma" required>
                </div>
                <div class="form-group">
                    <label for="treatment_ovk">Treatment OVK</label>
                    <input type="text" class="form-control" id="treatment_ovk" name="treatment_ovk" wire:model="treatment_ovk" required>
                </div>
                <div class="form-group">
                    <label for="kondisi">Kondisi</label>
                    <input type="text" class="form-control" id="kondisi" name="kondisi" wire:model="kondisi" required>
                </div>
                <div class="form-group">
                    <label for="saran">Saran</label>
                    <input type="text" class="form-control" id="saran" name="saran" wire:model="saran" required>
                </div>
            @endif
            </div>

            <div class="card-footer">
                @if($currentStep>1)
                <!-- jika step yang sekarang > 1 maka  muncul tombol previous -->
                <button wire:click="decrementStep" class="btn btn-primary float-left">Sebelumnya</button>
                @endif
                @if($currentStep<$totalStep)
                <!-- jika step yang sekarang < total step maka  muncul tombol next -->
                <button wire:click="incrementStep" class="btn btn-primary float-right">Selanjutnya</button>
                @endif
                @if($currentStep===$totalStep)
                <!-- jika step yang sekarang === total step maka  muncul tombol submit -->
                <button wire:click="submit" class="btn btn-success float-right">Simpan</button>
                @endif
            </div>

        </form>
    </div>

</div>
