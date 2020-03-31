$(document).ready(() => {
	$('input').on('keyup', function() {
		if ($(this).val() === '' | $(this).val() < 0) {
			$(this).parents('.input-group').find('.tambah').attr('disabled','disabled')
		} else {
			$(this).parents('.input-group').find('.tambah').removeAttr('disabled')
		}
	})
	$('.tambah').on('click', function() {
		$('.kosong').addClass('d-none')
		let data = $(this).parents('.card-body')
		let nama = data.find('.card-title').html()
		let id = data.attr('id')
		let harga = data.find('.harga').html()
		let qty = data.find('input').val()
		let exist = $('.list-group').find(`[key=${id}]`)
		if (exist.length === 0) {
			$('.list-group').append(`<li class="list-group-item item d-flex justify-content-between align-items-center" harga="${harga}" total="${qty}" name="${nama}" key="${id}">
		                                <div>
		                                    ${nama} <span class="badge badge-primary badge-pill">${qty}</span>
		                                </div>
		                                <div>
		                                    <button class="btn btn-sm btn-danger hapus"><i class="fa fa-trash"></i></button>
		                                </div>
		                            </li>`)
			$(this).attr('disabled','disabled')
			data.find('input').val('')
		} else {
			qty = Number(exist.find('.badge').html()) + Number(qty)
			exist.html(`<div>
                            ${nama} <span class="badge badge-primary badge-pill">${qty}</span>
                        </div>
                        <div>
                            <button class="btn btn-sm btn-danger hapus"><i class="fa fa-trash"></i></button>
                        </div>`)
			$(this).attr('disabled','disabled')
			data.find('input').val('')
		}
		if ($('select').val() === '') {
			$('.bayar').attr('disabled', 'disabled')
		} else{
			$('.bayar').removeAttr('disabled')
		}
	})
	$('.list-group').on('click', '.hapus', function() {
		$(this).parents('.list-group-item').remove()
		if ($('.list-group-item').length == 1) {
			$('.kosong').removeClass('d-none')
			$('.bayar').attr('disabled', 'disabled')
		}
	})
	$('select').on('change', () => {
		if ($('.list-group-item').length == 1) {
			$('.bayar').attr('disabled', 'disabled')
		} else {
			$('.bayar').removeAttr('disabled')
		}
	})
	$('.bayar').on('click', function function_name() {
		let meja = $('select').val()
		let item = $('.list-group').find('.item')
		let masakan = []
		let total = []
		let harga = []
		$.each(item, (index,item) => {
			masakan.push(item.attributes.name.value)
			total.push(item.attributes.total.value)
			harga.push(item.attributes.harga.value)
		})
		let url = `${transaksi_url}?masakan=${masakan.join()}&total=${total.join()}&meja=${meja}&harga=${harga}`
		window.location.href = url
	})
})