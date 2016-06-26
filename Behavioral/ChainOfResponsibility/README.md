Chain of Responsibility

Vấn đề:
- Nhận được một request và phải viết hàng loạt function để xử lý request đó. Có thể dùng switch, if else, tuy nhiên số lượng
function sẽ tăng lên, chưa kể việc thay đổi yêu cầu như cơm bữa. Rất là mess để bảo trì.

Ứng dụng:
- Tập các đối tượng có khả năng xử lý yêu cầu là 1 tập biến đổi
- Muốn gửi yêu cầu đên vài đối tượng, nhưng không xác định được đối tượng cụ thể xử lý yêu cầu
- Có nhiều hơn 1 đối tượng xử lý yêu cầu, trong khi đối tượng xử lý yêu cầu lại phụ thuộc vào ngữ cảnh sử dụng

Ưu điểm:
- Giảm kết nối, thay vì 1 đối tượng xử lý toàn bộ yêu cầu, nó có thể tham chiếu đến đối tượng tiếp theo
- Tăng tính linh hoạt, phân chia trách nghiệm cho các đối tượng
- Thay đổi được dây chuyền xử lý trong thời gian chạy
