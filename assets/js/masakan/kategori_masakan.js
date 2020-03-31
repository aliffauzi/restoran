$(document).ready(() => {
	let validator = $('form').parsley()
	let table = $('table').DataTable({
		ajax: read_url,
		columns: [
			{ data: 'nama' },
			{ data: null }
		],
		columnDefs: [
			{
				orderable: false,
				searchable: false,
				render: (data, type, row) => `
					<button class="btn btn-success btn-sm edit"><i class="fa fa-edit"></i></button>
					<button class="btn btn-danger btn-sm hapus"><i class="fa fa-trash"></i></button>
				`,
				targets: 1
			}
		],
		responsive: true
	})
	function reload() {
		table.ajax.reload()
	}
	$('form').on('submit', function(e) {
		e.preventDefault()
		$.ajax({
			url: $(this).attr('action'),
			type: $(this).attr('method'),
			dataType: 'json',
			data: $(this).serialize(),
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
			}
		})
	})
	$('tbody').on('click', '.edit', function() {
		let data = table.row($(this).parents('tr')).data()
		$('.modal').find('form').attr('action', `${edit_url}/${data.id}`)
		$('.modal').find('[name=nama]').val(data.nama)
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
	$('#tambah').on('hidden.bs.collapse', () => $('form')[0].reset())
	$('#tambah').on('show.bs.collapse', () => $('.batal').removeClass('d-none'))
	$('#tambah').on('hide.bs.collapse', () => $('.batal').addClass('d-none'))
})