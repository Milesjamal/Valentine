# GearTrail Machinery — API Documentation v1

## Authentication
All API requests must be authenticated using Laravel Sanctum Bearer tokens.
- **Header:** `Authorization: Bearer {token}`
- **Endpoint to check user:** `GET /api/user`

## Base URL
`/api/v1`

## Endpoints

### Workshop Jobs
#### List Jobs
`GET /jobs`
- **Description:** Returns a paginated list of workshop jobs scoped to the user's branch.
- **Includes:** Customer, Equipment, and assigned Mechanic.

#### Job Detail
`GET /jobs/{job}`
- **Description:** Returns detailed information for a specific job.
- **Includes:** Full status history and internal notes.

#### Update Job Status
`PATCH /jobs/{job}/status`
- **Body:**
  ```json
  {
    "status": "repair_in_progress",
    "notes": "Parts received, starting assembly."
  }
  ```
- **Description:** Transitions a job to a new state and logs the change.

### Field Operations
#### Record Field Visit
`POST /field-visits`
- **Body:**
  ```json
  {
    "mobile_service_request_id": 1,
    "mechanic_id": 5,
    "visit_date": "2026-07-04",
    "arrival_time": "09:00",
    "departure_time": "11:30",
    "outcome_notes": "Hydraulic leak fixed on site."
  }
  ```
- **Description:** Records a visit outcome for a field service request.

## Performance Target
The API is optimized for high-latency environments (mines/farms) with a response time target of **< 50ms** for core index and detail lookups.
