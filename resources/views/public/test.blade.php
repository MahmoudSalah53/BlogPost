<x-public.layouts :title="__('Home')">
        <div class="max-w-4xl mx-auto p-4 space-y-6">
            <!-- Header -->
            <div class="bg-white/90 backdrop-blur-xl rounded-3xl p-6 shadow-2xl border border-white/20">
                <div class="flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-2xl flex items-center justify-center">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                        <h1 class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-pink-600 bg-clip-text text-transparent">
                            BlogPost
                        </h1>
                    </div>
                    <a href="{{route('profile')}}" class="bg-gradient-to-r from-blue-500 to-purple-600 text-white px-6 py-3 rounded-2xl font-medium hover:shadow-lg">
                        <i class="fas fa-cog"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
            </div>

            <!-- Create Post Section -->
            <div class="bg-white/90 backdrop-blur-xl rounded-3xl p-6 shadow-2xl border border-white/20">
                <div class="flex items-start space-x-4">
                    <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                        JD
                    </div>
                    <div class="flex-1 space-y-4">
                        <textarea 
                            id="postContent" 
                            placeholder="What's on your mind?" 
                            class="w-full p-4 border-2 border-gray-100 rounded-2xl focus:border-purple-400 focus:outline-none resize-none h-24 bg-gray-50 hover:bg-white"
                        ></textarea>
                        
                        <input 
                            type="text" 
                            id="postTitle" 
                            placeholder="Post title..." 
                            class="w-full p-3 border-2 border-gray-100 rounded-xl focus:border-purple-400 focus:outline-none bg-gray-50 hover:bg-white"
                        >
                        
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-4">
                                <button class="flex items-center space-x-2 text-gray-600 hover:text-purple-600 p-2 rounded-xl hover:bg-purple-50">
                                    <i class="fas fa-image text-lg"></i>
                                    <span class="text-sm font-medium">Photo</span>
                                </button>
                                <button class="flex items-center space-x-2 text-gray-600 hover:text-blue-600 p-2 rounded-xl hover:bg-blue-50">
                                    <i class="fas fa-video text-lg"></i>
                                    <span class="text-sm font-medium">Video</span>
                                </button>
                                <button class="flex items-center space-x-2 text-gray-600 hover:text-green-600 p-2 rounded-xl hover:bg-green-50">
                                    <i class="fas fa-smile text-lg"></i>
                                    <span class="text-sm font-medium">Emoji</span>
                                </button>
                            </div>
                            <button 
                                onclick="createPost()" 
                                class="bg-gradient-to-r from-purple-500 to-pink-500 text-white px-8 py-3 rounded-2xl font-medium hover:shadow-lg"
                            >
                                Publish
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Posts Feed -->
            <div id="postsFeed" class="space-y-6">
                <!-- Sample Post 1 -->
                <div class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                                    AM
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Alex Morgan</h3>
                                    <p class="text-sm text-gray-500">2 hours ago</p>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-100">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                        </div>
                        
                        <h2 class="text-xl font-bold text-gray-800 mb-2">Amazing sunset today!</h2>
                        <p class="text-gray-600 mb-4">Just witnessed the most beautiful sunset from my balcony. Nature never fails to amaze me with its incredible colors and peaceful moments. 🌅</p>
                        
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&h=400&fit=crop" alt="Sunset" class="w-full h-64 object-cover rounded-2xl mb-4">
                        
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <button onclick="toggleLike(this)" class="flex items-center space-x-2 text-gray-600 hover:text-red-500 p-2 rounded-xl hover:bg-red-50">
                                <i class="far fa-heart text-lg"></i>
                                <span class="font-medium">24 Likes</span>
                            </button>
                            <button onclick="toggleComments(this)" class="flex items-center space-x-2 text-gray-600 hover:text-blue-500 p-2 rounded-xl hover:bg-blue-50">
                                <i class="far fa-comment text-lg"></i>
                                <span class="font-medium">8 Comments</span>
                            </button>
                            <button class="flex items-center space-x-2 text-gray-600 hover:text-green-500 p-2 rounded-xl hover:bg-green-50">
                                <i class="far fa-share-square text-lg"></i>
                                <span class="font-medium">Share</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Comments Section -->
                    <div class="comments-section hidden bg-gray-50/50 p-6 border-t border-gray-100">
                        <div class="space-y-4">
                            <div class="flex space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-r from-pink-400 to-red-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                    SM
                                </div>
                                <div class="flex-1 bg-white rounded-2xl p-3">
                                    <h4 class="font-semibold text-sm text-gray-800">Sarah Miller</h4>
                                    <p class="text-sm text-gray-600">Absolutely gorgeous! Where was this taken?</p>
                                    <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                                </div>
                            </div>
                            <div class="flex space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                    MJ
                                </div>
                                <div class="flex-1 bg-white rounded-2xl p-3">
                                    <h4 class="font-semibold text-sm text-gray-800">Mike Johnson</h4>
                                    <p class="text-sm text-gray-600">Beautiful shot! The colors are incredible.</p>
                                    <p class="text-xs text-gray-400 mt-1">45 minutes ago</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Add Comment -->
                        <div class="flex space-x-3 mt-4">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                JD
                            </div>
                            <div class="flex-1 flex space-x-2">
                                <input type="text" placeholder="Write a comment..." class="flex-1 p-2 border border-gray-200 rounded-xl focus:border-purple-400 focus:outline-none text-sm">
                                <button class="bg-purple-500 text-white px-4 py-2 rounded-xl hover:bg-purple-600">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sample Post 2 -->
                <div class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-r from-indigo-400 to-cyan-500 rounded-full flex items-center justify-center text-white font-bold">
                                    LW
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">Lisa Wilson</h3>
                                    <p class="text-sm text-gray-500">4 hours ago</p>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-100">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                        </div>
                        
                        <h2 class="text-xl font-bold text-gray-800 mb-2">Coffee and Productivity</h2>
                        <p class="text-gray-600 mb-4">Starting my day with a perfect cup of coffee and some productive work. There's something magical about morning routines that set the tone for the entire day. ☕✨</p>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <button onclick="toggleLike(this)" class="flex items-center space-x-2 text-gray-600 hover:text-red-500 p-2 rounded-xl hover:bg-red-50">
                                <i class="far fa-heart text-lg"></i>
                                <span class="font-medium">15 Likes</span>
                            </button>
                            <button onclick="toggleComments(this)" class="flex items-center space-x-2 text-gray-600 hover:text-blue-500 p-2 rounded-xl hover:bg-blue-50">
                                <i class="far fa-comment text-lg"></i>
                                <span class="font-medium">3 Comments</span>
                            </button>
                            <button class="flex items-center space-x-2 text-gray-600 hover:text-green-500 p-2 rounded-xl hover:bg-green-50">
                                <i class="far fa-share-square text-lg"></i>
                                <span class="font-medium">Share</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Comments Section -->
                    <div class="comments-section hidden bg-gray-50/50 p-6 border-t border-gray-100">
                        <div class="space-y-4">
                            <div class="flex space-x-3">
                                <div class="w-8 h-8 bg-gradient-to-r from-teal-400 to-blue-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                    RB
                                </div>
                                <div class="flex-1 bg-white rounded-2xl p-3">
                                    <h4 class="font-semibold text-sm text-gray-800">Robert Brown</h4>
                                    <p class="text-sm text-gray-600">Totally agree! Morning coffee is essential for productivity.</p>
                                    <p class="text-xs text-gray-400 mt-1">2 hours ago</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Add Comment -->
                        <div class="flex space-x-3 mt-4">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                JD
                            </div>
                            <div class="flex-1 flex space-x-2">
                                <input type="text" placeholder="Write a comment..." class="flex-1 p-2 border border-gray-200 rounded-xl focus:border-purple-400 focus:outline-none text-sm">
                                <button class="bg-purple-500 text-white px-4 py-2 rounded-xl hover:bg-purple-600">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script>
        // Sample posts data (simulating database structure)
        let posts = [
            {
                id: 1,
                title: "Amazing sunset today!",
                slug: "amazing-sunset-today",
                content: "Just witnessed the most beautiful sunset from my balcony. Nature never fails to amaze me with its incredible colors and peaceful moments.",
                featured_image: "https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=600&h=400&fit=crop",
                status: "published",
                created_at: "2025-06-08 14:00:00",
                updated_at: "2025-06-08 14:00:00",
                author: "Alex Morgan",
                likes: 24,
                comments: []
            },
            {
                id: 2,
                title: "Coffee and Productivity",
                slug: "coffee-and-productivity",
                content: "Starting my day with a perfect cup of coffee and some productive work. There's something magical about morning routines that set the tone for the entire day.",
                featured_image: null,
                status: "published",
                created_at: "2025-06-08 12:00:00",
                updated_at: "2025-06-08 12:00:00",
                author: "Lisa Wilson",
                likes: 15,
                comments: []
            }
        ];

        function toggleLike(button) {
            const heartIcon = button.querySelector('i');
            const likesText = button.querySelector('span');
            
            if (heartIcon.classList.contains('far')) {
                heartIcon.classList.remove('far');
                heartIcon.classList.add('fas');
                button.classList.add('text-red-500');
                button.classList.remove('text-gray-600');
                
                // Increase likes count
                const currentLikes = parseInt(likesText.textContent.match(/\d+/)[0]);
                likesText.textContent = `${currentLikes + 1} Likes`;
            } else {
                heartIcon.classList.remove('fas');
                heartIcon.classList.add('far');
                button.classList.remove('text-red-500');
                button.classList.add('text-gray-600');
                
                // Decrease likes count
                const currentLikes = parseInt(likesText.textContent.match(/\d+/)[0]);
                likesText.textContent = `${currentLikes - 1} Likes`;
            }
        }

        function toggleComments(button) {
            const post = button.closest('.bg-white\\/90');
            const commentsSection = post.querySelector('.comments-section');
            
            if (commentsSection.classList.contains('hidden')) {
                commentsSection.classList.remove('hidden');
                button.classList.add('text-blue-500');
                button.classList.remove('text-gray-600');
            } else {
                commentsSection.classList.add('hidden');
                button.classList.remove('text-blue-500');
                button.classList.add('text-gray-600');
            }
        }

        function createPost() {
            const title = document.getElementById('postTitle').value;
            const content = document.getElementById('postContent').value;
            
            if (!title.trim() || !content.trim()) {
                alert('Please fill in both title and content!');
                return;
            }

            // Create new post object
            const newPost = {
                id: posts.length + 1,
                title: title,
                slug: title.toLowerCase().replace(/\s+/g, '-'),
                content: content,
                featured_image: null,
                status: "published",
                created_at: new Date().toISOString(),
                updated_at: new Date().toISOString(),
                author: "John Doe",
                likes: 0,
                comments: []
            };

            // Add to posts array
            posts.unshift(newPost);

            // Create post HTML
            const postHTML = `
                <div class="bg-white/90 backdrop-blur-xl rounded-3xl shadow-2xl border border-white/20 overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white font-bold">
                                    JD
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800">John Doe</h3>
                                    <p class="text-sm text-gray-500">Just now</p>
                                </div>
                            </div>
                            <button class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-100">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                        </div>
                        
                        <h2 class="text-xl font-bold text-gray-800 mb-2">${title}</h2>
                        <p class="text-gray-600 mb-4">${content}</p>
                        
                        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
                            <button onclick="toggleLike(this)" class="flex items-center space-x-2 text-gray-600 hover:text-red-500 p-2 rounded-xl hover:bg-red-50">
                                <i class="far fa-heart text-lg"></i>
                                <span class="font-medium">0 Likes</span>
                            </button>
                            <button onclick="toggleComments(this)" class="flex items-center space-x-2 text-gray-600 hover:text-blue-500 p-2 rounded-xl hover:bg-blue-50">
                                <i class="far fa-comment text-lg"></i>
                                <span class="font-medium">0 Comments</span>
                            </button>
                            <button class="flex items-center space-x-2 text-gray-600 hover:text-green-500 p-2 rounded-xl hover:bg-green-50">
                                <i class="far fa-share-square text-lg"></i>
                                <span class="font-medium">Share</span>
                            </button>
                        </div>
                    </div>
                    
                    <!-- Comments Section -->
                    <div class="comments-section hidden bg-gray-50/50 p-6 border-t border-gray-100">
                        <div class="space-y-4">
                            <!-- Comments will be added here -->
                        </div>
                        
                        <!-- Add Comment -->
                        <div class="flex space-x-3 mt-4">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                JD
                            </div>
                            <div class="flex-1 flex space-x-2">
                                <input type="text" placeholder="Write a comment..." class="flex-1 p-2 border border-gray-200 rounded-xl focus:border-purple-400 focus:outline-none text-sm">
                                <button class="bg-purple-500 text-white px-4 py-2 rounded-xl hover:bg-purple-600">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            // Add new post to the feed
            const postsFeed = document.getElementById('postsFeed');
            postsFeed.insertAdjacentHTML('afterbegin', postHTML);

            // Clear form
            document.getElementById('postTitle').value = '';
            document.getElementById('postContent').value = '';

            // Show success message
            const successMessage = document.createElement('div');
            successMessage.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-2xl shadow-lg z-50';
            successMessage.textContent = 'Post created successfully!';
            document.body.appendChild(successMessage);

            setTimeout(() => {
                successMessage.remove();
            }, 3000);
        }

        // Add comment functionality
        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('fa-paper-plane') || e.target.closest('button')?.querySelector('.fa-paper-plane')) {
                const button = e.target.closest('button');
                const input = button.previousElementSibling;
                const commentText = input.value.trim();
                
                if (commentText) {
                    const commentsContainer = button.closest('.comments-section').querySelector('.space-y-4');
                    const commentHTML = `
                        <div class="flex space-x-3">
                            <div class="w-8 h-8 bg-gradient-to-r from-green-400 to-blue-500 rounded-full flex items-center justify-center text-white text-sm font-bold">
                                JD
                            </div>
                            <div class="flex-1 bg-white rounded-2xl p-3">
                                <h4 class="font-semibold text-sm text-gray-800">John Doe</h4>
                                <p class="text-sm text-gray-600">${commentText}</p>
                                <p class="text-xs text-gray-400 mt-1">Just now</p>
                            </div>
                        </div>
                    `;
                    
                    commentsContainer.insertAdjacentHTML('beforeend', commentHTML);
                    input.value = '';
                    
                    // Update comment count
                    const commentButton = button.closest('.bg-white\\/90').querySelector('button[onclick="toggleComments(this)"] span');
                    const currentCount = parseInt(commentButton.textContent.match(/\d+/)[0]);
                    commentButton.textContent = `${currentCount + 1} Comments`;
                }
            }
        });
    </script>
</x-public.layouts>