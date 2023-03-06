<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\SubCategory;
use Livewire\Component;
use Illuminate\Support\Str;

class Categories extends Component
{
    public $category_name;
    public $selected_category_id;
    public $updateCategoryMode = false;

    public $subcategory_name;
    public $selected_subcategory_id;
    public $parent_category = 0;
    public $updateSubCategoryMode = false;

    protected $listeners = [
        'resetModalForm',
        'deleteCategoryAction',
        'deleteSubCategoryAction',
        'updateCategoryOrdering',
        'updateSubCategoryOrdering',
    ];

    // Add category
    public function addCategory()
    {
        // Validation
        $this->validate([
            'category_name' => 'required|unique:categories,category_name',
        ]);

        // Store category
        $category = new Category();
        $category->category_name = $this->category_name;
        $saved = $category->save();

        if ($saved) {
            $this->dispatchBrowserEvent('hideCategoriesModal');
            $this->category_name = null;
            $this->showToastr('New category has been successfully added', 'success');
        } else {
            $this->showToastr('Something went wrong', 'error');
        }
        
    }

    // Edit Category
    public function editCategory($id)
    {
        $category = Category::findOrFail($id);
        $this->selected_category_id = $category->id;
        $this->category_name = $category->category_name;
        $this->updateCategoryMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showCategoriesModal');
    }

    // Update Category
    public function updateCategory()
    {
        if ($this->selected_category_id) {
            $this->validate([
                'category_name' => 'required|unique:categories,category_name,'.$this->selected_category_id,
            ]);

            $category = Category::findOrFail($this->selected_category_id);
            $category->category_name = $this->category_name;
            $updated = $category->save();

            if ($updated) {
                $this->dispatchBrowserEvent('hideCategoriesModal');
                $this->updateCategoryMode = false;
                $this->showToastr('Category has been successfully updated', 'success');
            } else {
                $this->showToastr('Someting went wrong', 'error');
            }
            
        }
    }

    // Add Sub category
    public function addSubCategory()
    {
        // Validation
        $this->validate([
            'parent_category' => 'required',
            'subcategory_name' => 'required|unique:sub_categories,subcategory_name',
        ]);

        // Store category
        $subcategory = new SubCategory();
        $subcategory->subcategory_name = $this->subcategory_name;
        $subcategory->slug = Str::slug($this->subcategory_name);
        $subcategory->parent_category = $this->parent_category;
        $saved = $subcategory->save();

        if ($saved) {
            $this->dispatchBrowserEvent('hideSubCategoriesModal');
            $this->parent_category = null;
            $this->subcategory_name = null;
            $this->showToastr('New subCategory has been successfully added', 'success');
        } else {
            $this->showToastr('Something went wrong', 'error');
        }
    }

    // Edit Sub categories
    public function editSubCategory($id)
    {
        $subcategory = SubCategory::findOrFail($id);
        $this->selected_subcategory_id = $subcategory->id;
        $this->parent_category = $subcategory->parent_category;
        $this->subcategory_name = $subcategory->subcategory_name;
        $this->updateSubCategoryMode = true;
        $this->resetErrorBag();
        $this->dispatchBrowserEvent('showSubCategoriesModal');
    }

    // Update Sub categories
    public function updateSubCategory()
    {
        if ($this->selected_subcategory_id) {
            $this->validate([
                'parent_category' => 'required',
                'subcategory_name' => 'required|unique:sub_categories,subcategory_name,'.$this->selected_subcategory_id,
            ]);

            $subcategory = SubCategory::findOrFail($this->selected_subcategory_id);
            $subcategory->subcategory_name = $this->subcategory_name;
            $subcategory->parent_category = $this->parent_category;
            $subcategory->slug = Str::slug($this->subcategory_name);
            $updated = $subcategory->save();

            if ($updated) {
                $this->dispatchBrowserEvent('hideSubCategoriesModal');
                $this->updateSubCategoryMode = false;
                $this->showToastr('SubCategory has been successfully updated', 'success');
            } else {
                $this->showToastr('Someting went wrong', 'error');
            }
            
        }
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $this->dispatchBrowserEvent('deleteCategory', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <b>'.$category->category_name.'<b> category',
            'id' => $id
        ]);
    }

    // Delete Category Action
    public function deleteCategoryAction($id)
    {
        $category = Category::where('id', $id)->first();
        $subcategories = SubCategory::where('parent_category', $category->id)
                                    ->whereHas('posts')
                                    ->with('posts')
                                    ->get();
    
        if (!empty($subcategories) && count($subcategories) > 0) {
            $totalPosts = 0;
            foreach($subcategories as $subcat) {
                $totalPosts += Post::where('category_id', $subcat->id)->get()->count();
            }
            $this->showToastr('This category has ('.$totalPosts.') posts related to it, cannot be deleted.', 'error');
        } else {
            SubCategory::where('parent_category', $category->id)->delete();
            $category->delete();
            $this->showToastr('Category has been successfully deleted.','info');
        }
        
    }

    // Delete Subcategory
    public function deleteSubCategory($id)
    {
        $subcategory = SubCategory::find($id);
        $this->dispatchBrowserEvent('deleteSubCategory', [
            'title' => 'Are you sure?',
            'html' => 'You want to delete <b>'.$subcategory->subcategory_name.'<b> subcategory',
            'id' => $id
        ]);
    }

    // Delete Subcategory Action
    public function deleteSubCategoryAction($id)
    {
        $subcategory = SubCategory::where('id', $id)->first();
        $posts = Post::where('category_id', $subcategory->id)->get()->toArray();

        if (!empty($posts) && count($posts) > 0) {
            $this->showToastr('This Subcategory has ('.count($posts).') posts related to it, cannot be deleted.', 'error');
        } else {
            $subcategory->delete();
            $this->showToastr('Subcategory has been successfully deleted.','info');
        }
        


    }

    public function showToastr($message, $type)
    {
        $this->dispatchBrowserEvent('showToastr', [
            'message' => $message,
            'type' => $type
        ]);
    }
    
    public function resetModalForm()
    {
        $this->updateCategoryMode = false;
        $this->updateSubCategoryMode = false;
    }

    public function updateCategoryOrdering($positions)
    {
        foreach($positions as $position) {
            $index = $position[0];
            $newPosition = $position[1];
            Category::where('id', $index)->update([
                'ordering' => $newPosition
            ]);
            $this->showToastr('Categories ordering have been successfully updated', 'success');
        }
    }

    public function updateSubCategoryOrdering($positions)
    {
        foreach($positions as $position) {
            $index = $position[0];
            $newPosition = $position[1];
            SubCategory::where('id', $index)->update([
                'ordering' => $newPosition
            ]);
            $this->showToastr('SubCategories ordering have been successfully updated', 'success');
        }
    }

    public function render()
    {
        return view('livewire.categories', [
            'categories' => Category::orderBy('ordering', 'asc')->get(),
            'subcategories' => SubCategory::orderBy('ordering', 'asc')->get()
        ]);
    }
}
