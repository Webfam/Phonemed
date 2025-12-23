<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // 1. Users table (if not exists from Laravel auth)
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email')->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password');
                $table->enum('role', ['customer', 'admin', 'staff'])->default('customer');
                $table->string('phone')->nullable();
                $table->text('address')->nullable();
                $table->string('city')->nullable();
                $table->string('state')->nullable();
                $table->string('zip_code')->nullable();
                $table->string('country')->default('Kenya');
                $table->boolean('is_active')->default(true);
                $table->rememberToken();
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 2. Customers table
        if (!Schema::hasTable('customers')) {
            Schema::create('customers', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
                $table->string('name');
                $table->string('email')->unique()->nullable();
                $table->string('phone')->unique();
                $table->text('address')->nullable();
                $table->string('city')->nullable();
                $table->string('country')->default('Kenya');
                $table->decimal('lifetime_spent', 12, 2)->default(0);
                $table->integer('total_orders')->default(0);
                $table->integer('risk_score')->default(0);
                $table->enum('vip_level', ['regular', 'bronze', 'silver', 'gold', 'platinum'])->default('regular');
                $table->date('last_purchase_date')->nullable();
                $table->json('purchase_behavior')->nullable();
                $table->timestamps();
                $table->softDeletes();
                
                $table->index(['vip_level', 'last_purchase_date']);
                $table->index(['phone', 'email']);
            });
        }

        // 3. Brands table
        if (!Schema::hasTable('brands')) {
            Schema::create('brands', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->text('description')->nullable();
                $table->string('logo')->nullable();
                $table->string('website')->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('sort_order')->default(0);
                $table->timestamps();
                $table->softDeletes();
            });
        }

        // 4. Categories table
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->text('description')->nullable();
                $table->string('image')->nullable();
                $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('set null');
                $table->integer('order')->default(0);
                $table->boolean('is_active')->default(true);
                $table->timestamps();
                $table->softDeletes();
                
                $table->index(['parent_id', 'is_active']);
            });
        }

        // 5. Products table
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->text('description')->nullable();
                $table->decimal('price', 10, 2);
                $table->decimal('compare_at_price', 10, 2)->nullable();
                $table->integer('stock_quantity')->default(0);
                $table->string('sku')->unique()->nullable();
                $table->string('barcode')->nullable();
                $table->boolean('is_active')->default(true);
                $table->boolean('is_featured')->default(false);
                $table->boolean('has_variants')->default(false);
                $table->boolean('requires_prescription')->default(false);
                
                $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
                $table->foreignId('brand_id')->nullable()->constrained()->onDelete('set null');
                
                $table->json('images')->nullable();
                $table->json('specifications')->nullable();
                $table->decimal('weight', 8, 2)->nullable();
                $table->string('dimensions')->nullable();
                $table->string('warranty_period')->nullable();
                $table->text('warranty_terms')->nullable();
                $table->text('side_effects')->nullable();
                $table->text('usage_instructions')->nullable();
                
                $table->timestamps();
                $table->softDeletes();
                
                $table->index(['is_active', 'is_featured']);
                $table->index(['category_id', 'is_active']);
                $table->index(['brand_id', 'is_active']);
            });
        }

        // 6. Product variants table
        if (!Schema::hasTable('product_variants')) {
            Schema::create('product_variants', function (Blueprint $table) {
                $table->id();
                $table->foreignId('product_id')->constrained()->onDelete('cascade');
                $table->string('name');
                $table->string('sku')->unique()->nullable();
                $table->decimal('price', 10, 2);
                $table->decimal('compare_at_price', 10, 2)->nullable();
                $table->integer('stock_quantity')->default(0);
                $table->json('attributes')->nullable();
                $table->string('image')->nullable();
                $table->decimal('weight', 8, 2)->nullable();
                $table->string('dimensions')->nullable();
                $table->boolean('is_default')->default(false);
                $table->timestamps();
                $table->softDeletes();
                
                $table->index(['product_id', 'is_default']);
            });
        }

        // 7. Orders table
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->id();
                $table->string('order_number')->unique();
                $table->foreignId('customer_id')->nullable()->constrained()->onDelete('set null');
                $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
                
                $table->enum('status', [
                    'pending',
                    'confirmed',
                    'processing',
                    'ready_for_delivery',
                    'out_for_delivery',
                    'delivered',
                    'cancelled',
                    'refunded',
                    'on_hold'
                ])->default('pending');
                
                $table->decimal('subtotal', 12, 2);
                $table->decimal('tax_amount', 12, 2)->default(0);
                $table->decimal('shipping_cost', 12, 2)->default(0);
                $table->decimal('discount_amount', 12, 2)->default(0);
                $table->decimal('total_amount', 12, 2);
                
                $table->string('customer_name');
                $table->string('customer_email');
                $table->string('customer_phone');
                $table->text('customer_address');
                $table->string('customer_city');
                $table->string('customer_country')->default('Kenya');
                
                $table->enum('delivery_method', ['pickup', 'delivery'])->default('delivery');
                $table->string('delivery_notes')->nullable();
                $table->dateTime('delivery_preference')->nullable();
                
                $table->integer('risk_score')->default(0);
                $table->text('risk_reasons')->nullable();
                $table->boolean('requires_review')->default(false);
                
                $table->enum('payment_method', ['mpesa', 'cash', 'card', 'bank'])->default('mpesa');
                $table->enum('payment_status', ['pending', 'paid', 'failed', 'refunded'])->default('pending');
                $table->string('mpesa_receipt')->nullable();
                
                $table->text('notes')->nullable();
                $table->json('status_history')->nullable();
                $table->timestamp('confirmed_at')->nullable();
                $table->timestamp('processing_at')->nullable();
                $table->timestamp('delivered_at')->nullable();
                $table->timestamp('cancelled_at')->nullable();
                
                $table->timestamps();
                $table->softDeletes();
                
                $table->index(['status', 'created_at']);
                $table->index(['customer_id', 'created_at']);
                $table->index(['payment_status', 'created_at']);
            });
        }

        // 8. Order items table
        if (!Schema::hasTable('order_items')) {
            Schema::create('order_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')->constrained()->onDelete('cascade');
                $table->foreignId('product_id')->constrained()->onDelete('cascade');
                $table->foreignId('variant_id')->nullable()->constrained('product_variants')->onDelete('set null');
                
                $table->string('product_name');
                $table->string('variant_name')->nullable();
                $table->string('sku');
                $table->decimal('unit_price', 10, 2);
                $table->integer('quantity');
                $table->decimal('total_price', 10, 2);
                
                $table->string('warranty_period')->nullable();
                $table->date('warranty_start_date')->nullable();
                $table->date('warranty_end_date')->nullable();
                
                $table->timestamps();
                
                $table->index(['order_id', 'product_id']);
                $table->index('sku');
            });
        }

        // 9. Payments table
        if (!Schema::hasTable('payments')) {
            Schema::create('payments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')->constrained()->onDelete('cascade');
                $table->string('payment_reference')->unique();
                $table->enum('payment_method', ['mpesa', 'cash', 'card', 'bank'])->default('mpesa');
                $table->decimal('amount', 12, 2);
                $table->enum('status', ['pending', 'completed', 'failed', 'cancelled'])->default('pending');
                
                $table->string('mpesa_phone')->nullable();
                $table->string('mpesa_transaction_id')->nullable();
                $table->string('mpesa_receipt_number')->nullable();
                $table->json('mpesa_response')->nullable();
                
                $table->integer('retry_count')->default(0);
                $table->text('failure_reason')->nullable();
                $table->json('verification_logs')->nullable();
                
                $table->timestamps();
                
                $table->index(['status', 'created_at']);
                $table->index(['payment_reference', 'order_id']);
            });
        }

        // 10. Deliveries table
        if (!Schema::hasTable('deliveries')) {
            Schema::create('deliveries', function (Blueprint $table) {
                $table->id();
                $table->foreignId('order_id')->constrained()->onDelete('cascade');
                $table->enum('status', [
                    'pending',
                    'assigned',
                    'picked_up',
                    'in_transit',
                    'delivered',
                    'failed',
                    'cancelled'
                ])->default('pending');
                
                $table->string('delivery_person_name')->nullable();
                $table->string('delivery_person_phone')->nullable();
                $table->string('vehicle_type')->nullable();
                $table->string('vehicle_number')->nullable();
                
                $table->decimal('delivery_cost', 10, 2);
                $table->decimal('distance_km', 8, 2)->nullable();
                $table->integer('estimated_minutes')->nullable();
                
                $table->text('delivery_address');
                $table->string('delivery_city');
                $table->string('delivery_zone')->nullable();
                $table->decimal('latitude', 10, 8)->nullable();
                $table->decimal('longitude', 11, 8)->nullable();
                
                $table->timestamp('assigned_at')->nullable();
                $table->timestamp('picked_up_at')->nullable();
                $table->timestamp('delivered_at')->nullable();
                
                $table->text('delivery_notes')->nullable();
                $table->string('recipient_name')->nullable();
                $table->string('recipient_phone')->nullable();
                $table->string('signature_image')->nullable();
                
                $table->timestamps();
                
                $table->index(['status', 'delivery_zone']);
                $table->index(['order_id', 'status']);
            });
        }

        // 11. Prescriptions table
        if (!Schema::hasTable('prescriptions')) {
            Schema::create('prescriptions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
                $table->foreignId('customer_id')->nullable()->constrained()->onDelete('set null');
                
                $table->string('prescription_number')->unique();
                $table->date('issue_date');
                $table->date('expiry_date');
                $table->text('notes')->nullable();
                
                $table->string('doctor_name');
                $table->string('doctor_license')->nullable();
                
                $table->string('patient_name');
                $table->string('patient_age');
                $table->enum('patient_gender', ['male', 'female', 'other']);
                $table->text('diagnosis')->nullable();
                
                $table->enum('status', ['pending', 'approved', 'rejected', 'filled'])->default('pending');
                $table->text('rejection_reason')->nullable();
                
                $table->json('images')->nullable();
                
                $table->timestamps();
                $table->softDeletes();
                
                $table->index(['user_id', 'status']);
                $table->index(['customer_id', 'status']);
                $table->index(['prescription_number']);
            });
        }
    }

    public function down()
    {
        Schema::disableForeignKeyConstraints();
        
        Schema::dropIfExists('prescriptions');
        Schema::dropIfExists('deliveries');
        Schema::dropIfExists('payments');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('product_variants');
        Schema::dropIfExists('products');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('brands');
        Schema::dropIfExists('customers');
        
        Schema::enableForeignKeyConstraints();
    }
};