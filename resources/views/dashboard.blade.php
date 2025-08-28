<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Tableau de bord') }}
            </h2>

            <!-- Logout button -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" 
                        class="px-4 py-2 text-red-600 border border-red-500 rounded-lg hover:bg-red-50 transition">
                    Déconnexion
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Welcome -->
            <div class="mb-6 mt-6">
                <h1 class="text-2xl font-bold text-gray-900">
                    Bonjour, {{ Auth::user()->name }} 👋
                </h1>
                <p class="text-gray-600">Bienvenue dans votre espace client.</p>
            </div>

            <!-- Tabs -->
            <div class="bg-white shadow rounded-lg">
                <div class="border-b px-6 py-3 flex space-x-4">
                    <button class="tab-btn text-brand font-medium border-b-2 border-brand px-3 py-2" data-tab="programmes">
                        Mes programmes
                    </button>
                    <button class="tab-btn text-gray-600 hover:text-brand px-3 py-2" data-tab="etablissements">
                        Mes établissements
                    </button>
                    <button class="tab-btn text-gray-600 hover:text-brand px-3 py-2" data-tab="bourses">
                        Mes bourses
                    </button>
                    <button class="tab-btn text-gray-600 hover:text-brand px-3 py-2" data-tab="ressources">
                        Mes ressources
                    </button>
                </div>

                <!-- Tab Contents -->
                <div class="p-6">
                    <div id="programmes" class="tab-content">
                        <h2 class="text-xl font-semibold mb-4">Mes programmes</h2>
                        <p class="text-gray-600">Aucun programme enregistré pour l’instant.</p>
                    </div>
                    <div id="etablissements" class="tab-content hidden">
                        <h2 class="text-xl font-semibold mb-4">Mes établissements</h2>
                        <p class="text-gray-600">Aucun établissement ajouté.</p>
                    </div>
                    <div id="bourses" class="tab-content hidden">
                        <h2 class="text-xl font-semibold mb-4">Mes bourses</h2>
                        <p class="text-gray-600">Aucune demande de bourse en cours.</p>
                    </div>
                    <div id="ressources" class="tab-content hidden">
                        <h2 class="text-xl font-semibold mb-4">Mes ressources</h2>
                        <p class="text-gray-600">Pas encore de ressources disponibles.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Tabs JS -->
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const tabs = document.querySelectorAll(".tab-btn");
            const contents = document.querySelectorAll(".tab-content");

            tabs.forEach(tab => {
                tab.addEventListener("click", () => {
                    tabs.forEach(t => t.classList.remove("text-brand", "border-brand", "border-b-2"));
                    contents.forEach(c => c.classList.add("hidden"));

                    tab.classList.add("text-brand", "border-brand", "border-b-2");
                    document.getElementById(tab.dataset.tab).classList.remove("hidden");
                });
            });
        });
    </script>
</x-app-layout>
