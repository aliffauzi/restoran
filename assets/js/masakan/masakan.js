$(document).ready(() => {
	let validator = $('form').parsley()
	let table = $('table').DataTable({
		ajax: read_url,
		columns: [
			{ data: 'gambar' },
			{ data: 'nama' },
			{ data: 'kategori' },
			{ data: 'harga' },
			{ data: null }
		],
		columnDefs: [
			{
				render: data => `<img class="w-100" src="${base_url}/uploads/${data}">`,
				targets: 0
			},
			{
				orderable: false,
				searchable: false,
				render: (data, type, row) => `
					<button class="btn btn-success btn-sm edit"><i class="fa fa-edit"></i></button>
					<button class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></button>
				`,
				targets: 4
			}
		],
		responsive: true
	})
	function reload() {
		table.ajax.reload()
	}
	$('form').on('submit', function(e) {
		e.preventDefault()
		let data = new FormData(this)
		let file = $(this).find('[type=file]').prop('files')[0]
		data.append('gambar', file)
		$.ajax({
			url: $(this).attr('action'),
			type: $(this).attr('method'),
			dataType: 'json',
			data: data,
			processData: false,
			contentType: false,
			success: (res) => {
				reload()
				if (res === 'tambah') {
					$('#tambah').collapse('hide')
					$('.info').html(`<div class="alert alert-primary alert-dismissible">
						Sukses Menambahkan Data
						<a href="#" class="close" data-dismiss="alert">&times;</a>
					</div>`)
				} else {
					$('.info').html(`<div class="alert alert-primary alert-dismissible">
						Sukses Mengedit Data
						<a href="#" class="close" data-dismiss="alert">&times;</a>
					</div>`)
					$('.modal').modal('hide')
				}
			},
			error: () => $(this).find('.info').html(`<div class="alert alert-danger">Format File Tidak Didukung</div>`)
		})
	})
	$('tbody').on('click', '.edit', function() {
		let data = table.row($(this).parents('tr')).data()
		$('.modal').find('form').attr('action', `${edit_url}/${data.id}`)
		$('.modal').find('[name=nama]').val(data.nama)
		$('.modal').find('[name=id_kategori]').append(`<option value="${data.id_kategori}">${data.kategori}</option>`)
		$('.modal').find('[name=harga]').val(data.harga)
		$('.modal').modal('show')
	})
	$('tbody').on('click', '.hapus', function() {
		let row = table.row($(this).parents('tr'))
		let id = row.data().id
		$.ajax({
			url: `${hapus_url}/${id}`,
			type: 'get',
			dataType: 'json',
			success: () => {
				row.remove().draw()
				$('.info').html(`<div class="alert alert-danger alert-dismissible">
					Sukses Menghapus Data
					<a href="#" class="close" data-dismiss="alert">&times;</a>
				</div>`)
			}
		})
	})
	$('[name=id_kategori]').select2({
		placeholder: 'Kategori',
		ajax: {
			url: get_kategori_url,
			type: 'get',
			data: params => ({
				kategori: params.term
			}),
			processResults: res => ({
				results: res
			}),
			cache: true
		}
	})
	$('.modal').on('hidden.bs.modal', () => $('form')[1].reset())
	$('#tambah').on('hidden.bs.collapse', () => $('form')[0].reset())
	$('#tambah').on('show.bs.collapse', () => $('.batal').removeClass('d-none'))
	$('#tambah').on('hide.bs.collapse', () => $('.batal').addClass('d-none'))
})