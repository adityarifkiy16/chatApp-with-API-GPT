export default function combineAndSortData(dataRequest, dataResponse) {
  const sortedData = [...dataRequest, ...dataResponse].sort((a, b) =>
    b.time.localeCompare(a.time)
  );
  return sortedData;
}
