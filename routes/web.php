@@ -22,3 +22,5 @@
})->middleware(['auth'])->name('dashboard');

require _DIR_.'/auth.php';

Route ::resource('clo', cloController::class)->middleware(['auth'])->only('show', 'create');