export default function combineAndSortData(dataRequest, dataResponse) {
  const sortedData = [...dataRequest, ...dataResponse].sort((a, b) =>
    a.time.localeCompare(b.time)
  );
  return sortedData;
}
