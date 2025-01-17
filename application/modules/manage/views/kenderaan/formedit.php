<form method="POST" action="<?php echo module_url("kenderaan/save/" .$vehicle->T01_ID)?>">
<div class="col-lg-12">
  <div class="card">
	<div class="px-4 py-3 border-bottom">
	  <h5 class="card-title fw-semibold mb-0">EDIT TRANSPORT</h5>
	
	<!-- </div>
	<div class="card-body">
	  <div class="mb-4 row align-items-center"> 
		<label for="exampleInputText5" class="form-label fw-semibold col-sm-3 col-form-label text-end">Name</label>
		<div class="col-sm-9">
		  NOORHAZREEN BINTI AMRI
		</div>
	  </div>
	  <div class="mb-4 row align-items-center"> 
		<label for="exampleInputText5" class="form-label fw-semibold col-sm-3 col-form-label text-end">No Matrik</label>
		<div class="col-sm-9">
		  S62000
		</div>
	  </div>
	  <div class="mb-4 row align-items-center"> 
		<label for="exampleInputText5" class="form-label fw-semibold col-sm-3 col-form-label text-end">Penyelia</label>
		<div class="col-sm-9">
		  PROFESOR MADYA DR MUSTAFA BIN MAN
		</div>
	  </div> -->
	  <div class="mb-4 row align-items-center"> 
		<label for="exampleInputText5" class="form-label fw-semibold col-sm-3 col-form-label text-end">KOD KENDERAAN</label>
		<div class="col-sm-9">
		  <input type="text" class="form-control" id="exampleInputText6" placeholder="dd/mm/yyyy" name="kod_kend" value="<?php echo $vehicle->T01_KOD_KENDERAAN?>">
		</div>
	  </div>
	  <div class="mb-4 row align-items-center"> 
		<label for="exampleInputText5" class="form-label fw-semibold col-sm-3 col-form-label text-end">NAMA KENDERAAN</label>
		<div class="col-sm-9">
		  <input type="text" class="form-control fw-semibold"  id="exampleInputText6" placeholder="dd/mm/yyyy" name="nama" value="<?php echo $vehicle->T01_NAMA_KENDERAAN?>"> 
		</div>
	  </div>
	  <div class="mb-4 row align-items-center">
		<label for="exampleInputText6" class="form-label fw-semibold col-sm-3 col-form-label text-end">NO PLAT
		  </label>
		<div class="col-sm-9">
		  <div class="input-group">
			<input type="text" class="form-control" id="exampleInputText6" placeholder="123 4567 201" name="no_plat" value="<?php echo $vehicle->T01_PLAT?>">
		  </div>
		</div>
	  </div>
	  <div class="mb-4 row align-items-center">
		<label for="startDate" class="form-label fw-semibold col-sm-3 col-form-label text-end">JENAMA</label>
		<div class="col-sm-9">
		  <div class="input-group">
			<input type="text" class="form-control" id="exampleInputText6" placeholder="Tujuan" name="jenama" value="<?php echo $vehicle->T01_JENAMA?>">
		  </div>
		</div>
	  </div>
	  <div class="mb-4 row align-items-center">
		<label for="startDate" class="form-label fw-semibold col-sm-3 col-form-label text-end">VARIAN</label>
		<div class="col-sm-9">
		  <div class="input-group">
			<select class="form-select" id="exampleInputselect" aria-label="Default select example">
                        <option selected="">SEDAN</option>
                        <option value="1">HATCHBACK</option>
						<option value="2">Pengangkutan Awam</option>
                      </select>
		  </div>
		</div>
	  </div>
	  <div class="mb-4 row align-items-center">
		<label for="startDate" class="form-label fw-semibold col-sm-3 col-form-label text-end">Alasan Sekiranya Menggunakan Kenderaan Sendiri</label>
		<div class="col-sm-9">
		  <div class="input-group">
			<textarea type="text" class="form-control" id="exampleInputText6" placeholder="Alasan" rows"4" name=varian> </textarea>
		  </div>
		</div>
	  </div>
	   <div class="row">
                          <div class="col-sm-3"></div>
                          <div class="col-sm-9">
                            <div class="d-flex align-items-center gap-6">
                             
							  <button class="btn btn-primary">Simpan</button>
                              <button class="btn bg-danger-subtle text-danger">Cancel</button>
                            </div>
                          </div>
                        </div>
	 
	  </div>
	</div>
  </div>
  </form>
  