# GearTrail Machinery — Final System Architecture

## 1. Tech Stack
- **Framework:** Laravel 11.x
- **Frontend:** Livewire 3.5 (Mon monolithic, server-driven dashboards)
- **Database:** PostgreSQL (with polymorphic relationships and composite indexing)
- **Authentication:** Laravel Fortify (with mandatory Staff 2FA)
- **API Security:** Laravel Sanctum (Token-based)
- **RBAC:** Spatie Laravel Permission

## 2. Core Design Patterns
### Service-Oriented Logic
Business rules are decoupled from Controllers and Livewire components into dedicated services:
- `WorkshopService`: Manages job lifecycles, status history, and maintenance records.
- `BillingService`: Handles quotation-to-invoice conversion and inventory part deduction.
- `FleetService`: Manages truck hire contracts and Nissan UD 80 fleet logistics.

### Data Isolation & Integrity
- **Branch Scoping:** All core models use the `HasBranchScope` trait to automatically filter data by the user's active branch.
- **Audit Logging:** Every mutation (create, update, delete) is captured via the `Auditable` trait and `AuditObserver`, stored in a polymorphic `audit_logs` table.

## 3. Module Map & Tables
| Module | Key Models |
|---|---|
| **Identity** | User, Role, Permission |
| **Workshop** | WorkshopJob, ServiceRequest, JobNote, JobStatusHistory |
| **Equipment** | Equipment, MaintenanceHistory, Media |
| **Commercial** | Quotation, Invoice, Payment, QuotationItem, InvoiceItem |
| **Inventory** | Product, Supplier, InventoryTransaction |
| **Field Ops** | MobileServiceRequest, FieldVisit, ServiceLocation |
| **Logistics** | Truck, TruckHireRequest, TruckContract |
| **System** | AuditLog, Notification, Branch |

## 4. Operational Lifecycle
1. **Intake:** Customer Request (Web/BookingWizard) → Equipment Registration.
2. **Phase A:** Inspection & Diagnosis (Mechanic/WorkshopManager).
3. **Phase B:** Quotation (Commercial) → Customer Approval (Gate).
4. **Phase C:** Repair In Progress → Testing → Completed.
5. **Phase D:** Invoice Generation → Payment → Automatic Inventory Adjustment.
6. **Archival:** Equipment Service History generated automatically.
