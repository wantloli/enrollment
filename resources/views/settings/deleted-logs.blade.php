<x-admin-layout>
    <div class="max-w-4xl ">
        <div class="mb-6">
            <div class="flex justify-between items-center">
                <h1 class="text-2xl font-bold text-gray-800">Deleted Records Logs</h1>
                <div class="space-x-2">
                    <button onclick="clearLogs()"
                        class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition-colors">
                        <i class="fas fa-trash-alt mr-2"></i>Clear Logs
                    </button>
                    <button onclick="downloadLogs()"
                        class="px-4 py-2 bg-green-500 text-white rounded-md hover:bg-green-600 transition-colors">
                        <i class="fas fa-download mr-2"></i>Download Logs
                    </button>
                </div>
            </div>

            <div class="mt-4">
                <div class="relative">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    <input type="text" id="logSearch" placeholder="Search logs..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        onkeyup="searchLogs()">
                </div>
            </div>
        </div>

        <div class="relative bg-white rounded-lg border border-gray-300 shadow-sm ">
            <div id="logsContainer" class="h-[calc(100vh-280px)] overflow-y-auto">
                <pre id="logsContent" class="whitespace-pre-wrap break-words text-sm text-gray-700 p-4">{{ $logs }}</pre>
            </div>

            <div class="fixed bottom-8 right-8 flex flex-col space-y-2 z-50">
                <button onclick="scrollToTop()"
                    class="p-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors shadow-lg group">
                    <i class="fas fa-chevron-up group-hover:-translate-y-1 transition-transform"></i>
                </button>
                <button onclick="scrollToBottom()"
                    class="p-3 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors shadow-lg group">
                    <i class="fas fa-chevron-down group-hover:translate-y-1 transition-transform"></i>
                </button>
            </div>
        </div>
    </div>

    <script>
        function scrollToTop() {
            document.getElementById('logsContainer').scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        function scrollToBottom() {
            const container = document.getElementById('logsContainer');
            container.scrollTo({
                top: container.scrollHeight,
                behavior: 'smooth'
            });
        }

        function searchLogs() {
            const searchText = document.getElementById('logSearch').value.toLowerCase();
            const content = document.getElementById('logsContent');
            const text = content.textContent;

            if (searchText.length < 2) {
                content.innerHTML = text;
                return;
            }

            const highlightedText = text.replace(
                new RegExp(searchText, 'gi'),
                match => `<span class="bg-yellow-200">${match}</span>`
            );

            content.innerHTML = highlightedText;
        }

        function clearLogs() {
            if (confirm('Are you sure you want to clear the deleted records logs?')) {
                // Add AJAX call to clear deleted logs
                fetch('/settings/clear-deleted-logs', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            document.getElementById('logsContent').textContent = 'No deleted logs found.';
                        }
                    });
            }
        }

        function downloadLogs() {
            const content = document.getElementById('logsContent').textContent;
            const blob = new Blob([content], {
                type: 'text/plain'
            });
            const url = window.URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `deleted-records-logs-${new Date().toISOString().split('T')[0]}.txt`;
            document.body.appendChild(a);
            a.click();
            window.URL.revokeObjectURL(url);
            document.body.removeChild(a);
        }
    </script>
</x-admin-layout>
