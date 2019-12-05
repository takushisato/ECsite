!function ($) {
	'use strict';

	$(function () {

		// ツールチップとポップオーバーのデモ
		$('.tooltip-demo').tooltip({
			selector: '[data-toggle="tooltip"]',
			container: 'body'
		})

		$('[data-toggle="tooltip"]').tooltip()
		$('[data-toggle="popover"]').popover()

		// トーストのデモ
		$('.toast')
			.toast({
				autohide: false
			})
			.toast('show')
	
		// モーダル内のデモ
		$('.tooltip-test').tooltip()
		$('.popover-test').popover()

		//モーダル関連のターゲットデモ
		$('#exampleModal').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) 
			var recipient = button.data('whatever') 
			var modal = $(this)
			modal.find('.modal-title').text(recipient + 'にメッセージを送信')
			modal.find('.modal-body input').val(recipient)
		})

		//カスタムチェックボックス
		$('.your-checkbox').prop('indeterminate', true)

		// 空リンクを無効にする
		$('a[href="#"]').click(function (e) {
			e.preventDefault()
})

		//検証フォーム
		window.addEventListener('load', function() {
			var forms = document.getElementsByClassName('needs-validation');
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() == false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add("was-validated");
				}, false);
			});
		}, false);
	})

		//クリップボードにコピー（設定例）
		$('.copy-btn')
			.tooltip()
			.attr('data-toggle', 'tooltip')
			.attr('data-original-title', 'クリップボードにコピー')
			.on('mouseleave', function () {
				$(this).tooltip('hide')
			})

		var clipboard = new ClipboardJS('.copy-btn', {
			target: function (trigger) {
				return trigger.nextElementSibling
			}
		})

		new ClipboardJS('.modal-footer > .copy-btn', {
		    container: document.getElementById('modal')
		});

		clipboard.on('success', function (e) {
			$(e.trigger)
				.attr('title', 'コピー完了!')
				.tooltip('_fixTitle')
				.tooltip('show')
				.attr('title', 'クリップボードにコピー')
				.tooltip('_fixTitle')

			e.clearSelection()
		})

		clipboard.on('error', function (e) {
			var modifierKey = /Mac/i.test(navigator.userAgent) ? '\u2318' : 'Ctrl'
			var fallbackMsg = 'C + ' + modifierKey + 'でコピー'

			$(e.trigger)
				.attr('title', fallbackMsg)
				.tooltip('_fixTitle')
				.tooltip('show')
				.attr('title', 'クリップボードにコピー')
				.tooltip('_fixTitle')
		})

		//クリップボードにコピー（チートシート）
		$('.copy-class')
			.tooltip()
			.attr('data-toggle', 'tooltip')
			.attr('data-original-title', 'クラス名をコピー')
			.on('mouseleave', function () {
				$(this).tooltip('hide')
			})

		var clipboard = new ClipboardJS('.copy-class', {
			target: function (trigger) {
				return trigger.parentElement.firstElementChild
			}
		})

		clipboard.on('success', function (e) {
			$(e.trigger)
				.attr('title', 'コピー完了!')
				.tooltip('_fixTitle')
				.tooltip('show')
				.attr('title', 'クラス名をコピー')
				.tooltip('_fixTitle')

			e.clearSelection()
		})

		clipboard.on('error', function (e) {
			var modifierKey = /Mac/i.test(navigator.userAgent) ? '\u2318' : 'Ctrl'
			var fallbackMsg = 'C + ' + modifierKey + 'でコピー'

			$(e.trigger)
				.attr('title', fallbackMsg)
				.tooltip('_fixTitle')
				.tooltip('show')
				.attr('title', 'クラス名をコピー')
				.tooltip('_fixTitle')
		})
}(jQuery)
