<div class="px-20 py-40">
    <h1 class="text-2xl font-bold text-blue-950">Kitchen <span class="text-orange-400">Dashboard.</span></h1>
    <div class="flex justify-center items-center mt-20 flex-col">
        <?php foreach ($orders as $orderId => $items): ?>
            <table class="shadow-xl font[Poppins] border-2 text-white overflow-hidden w-screen mb-10">
                <caption class="text-gray-600 mb-4 text-base font-normal text-start">
                    <p class="py-1 px-2 bg-gray-100 rounded-full inline">Order Id: <?= $orderId ?>, Order At: <?= $items[0]->order_date ?></p>
                </caption>
                <thead>
                    <tr>
                        <th class="py-3 px-2 bg-cyan-800">ORDER ID</th>
                        <th class="py-3 px-2 bg-cyan-800">MENU</th>
                        <th class="py-3 px-2 bg-cyan-800">QTY</th>
                        <th class="py-3 px-2 bg-cyan-800">STATUS</th>
                        <th class="py-3 px-2 bg-cyan-800">ACTION</th>
                    </tr>
                </thead>
                <tbody class="text-cyan-900 text-center">
                    <?php $readyButtonDisplayed = false; ?>
                    <?php foreach ($items as $item): ?>
                        <tr class="bg-cyan-200 hover:bg-cyan-100 hover:scale-105 cursor-pointer duration-300">
                            <td class="py-3 px-6"><?= $item->order_id ?></td>
                            <td class="py-3 px-6 font-bold"><?= $item->menu_name ?> </td>
                            <td class="py-3 px-6"><?= $item->quantity ?></td>
                            <td class="py-3 px-6">
                                <p class="bg-orange-400 text-white py-0.5 text-center px-2 rounded-full inline text-sm font-semibold">Progres</p>
                            </td>
                            <td class="py-3 px-6">
                                <?php if (!$readyButtonDisplayed): ?>
                                    <form action="/menu" method="POST">
                                        <input type="hidden" name="_method" value="PUT">
                                        <input type="hidden" name="order_id" value="<?= $item->order_id ?>">
                                        <button type="submit" class="hover:bg-red-600 px-5 py-2 bg-red-500 rounded-lg text-white">Ready</button>
                                    </form>
                                    <?php $readyButtonDisplayed = true; ?>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>
    </div>
</div>
